<?php 
	/**
	* A class used to export data as a CVS file
	*
	* This class is used to allow for export of data using 
	* a veritey of methods that allow for db support, exporting
	* via an array input.
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @todo A lot..
	* @version 0.1
	*/
	class CSV_Export
	{
		/**
		* The basic export funciton.
		*
		* This method is the basic method for exporting to csv. The only required
		* parameter is an array of data. This method allows for other optional
		* parameters. These include column headers, a file name, delimiter type,
		* enclosure type, and if to force download.
		* 
		* @param Array data Data to be placed in the csv file
		* @param Array column_headers Optional column headers. Default is an empty array.
		* @param String file_name Optional file name. Default is data.cvs
		* @param String delimiter Optional delimiter type. Default is '.
		* @param String enclosure Optional value inclosing type. Default is "".
		* @param Bool force_download Optional force download. Default is true.
		* @return void
		*/
		public function export($data, $column_headers = array(), $file_name = 'data.cvs', $delimiter = ',', $enclosure = '"', $force_download = true)
		{
			if($force_download)
			{
				// This will force the file to be downloaded and not displayed
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename=' . $file_name);

				$out_stream = fopen('php://output', 'w');

			} else {
				$out_stream = fopen($filename, 'w');
			}

			// If column headers are to be included
			if(count($column_headers) > 0 )
			{
				fputcsv($out_stream, $column_headers, $delimiter, $enclosure);
			}

			// Add each element of data to the cvs file stream
			foreach ($data as $line) {
				fputcsv($out_stream, $line, $delimiter, $enclosure);
			}

			fclose($fp);
		}

	}
