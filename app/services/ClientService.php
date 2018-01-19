<?php

namespace App\Services;

use App\Client;

class ClientService
{
    private $client;

    /**
     * ClientService constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->filename = storage_path('app/client/file.csv');
    }

    /**
     * @return array|bool
     */
    public function all()
    {
        $clientArray = $this->csvToArray($this->filename);

        return $clientArray;
    }

    /**
     * @param string $filename
     * @param string $delimiter
     * @return array|bool
     */
    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;

        $data = array();

        if (($handle = fopen($filename, 'r')) !== false) {

            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {

                if (!$header)
                    $header = $row;

                else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
        return $data;
    }

    /**
     * @param $request
     * @return string
     */
    public function create($request)
    {
        try {
            $input = $request->except('_token');

            $filePointer = fopen($this->filename, 'a');

            fputcsv($filePointer, $input);

            fclose($filePointer);

        } catch (\Throwable $t) {
            return 'Something went wrong';
        }

    }

    /**
     * @param $id
     * @param string $delimiter
     * @return array
     */
    public function find($id, $delimiter = ',')
    {
        $header = null;

        $i = 0;

        if (($handle = fopen($this->filename, 'r')) !== false) {

            while ($row = fgetcsv($handle, 1000, $delimiter)) {

                if (!$header)
                    $header = $row;

                $data = array_combine($header, $row);

                if ($i == $id) {
                    return $data;
                    break;
                }

                ++$i;
            }
            fclose($handle);
        }
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        try {
            list($i, $tempfile, $input, $output) = $this->inputOutputFile();

            while (($data = fgetcsv($input)) !== FALSE) {
                if ($i == $id) {
                    $data = $request->except('_token', '_method');
                }
                fputcsv($output, $data);
                $i++;
            }
            $this->filesClose($input, $output, $tempfile);

        } catch (\Throwable $t) {
            return $this->logger->error("Client Record is not Edited");
        }

    }

    /**
     * @param $id
     * @return string|void
     */
    public function delete($id)
    {
        try {
            list($i, $tempfile, $input, $output) = $this->inputOutputFile();

            while (($data = fgetcsv($input)) !== FALSE) {
                if ($i == $id) {
                    $data = ['', '', '', '', '', '', '', '', ''];
                }
                fputcsv($output, $data);
                $i++;
            }
            return $this->filesClose($input, $output, $tempfile);
        } catch (\Throwable $t) {
            return 'Something went wrong';
        }

    }

    /**
     * @return array|string
     */
    public function inputOutputFile()
    {
        $i = 0;

        $tempfile = tempnam(".", "tmp");

        if (!$input = fopen($this->filename, 'r')) {
            return 'could not open existing csv file';
        }

        if (!$output = fopen($tempfile, 'w')) {
            return 'could not open temporary output file';
        }
        return array($i, $tempfile, $input, $output);
    }


    /**
     * @param $input
     * @param $output
     * @param $tempfile
     */
    public function filesClose($input, $output, $tempfile)
    {
        fclose($input);
        fclose($output);

        unlink($this->filename);
        rename($tempfile, $this->filename);
    }

}