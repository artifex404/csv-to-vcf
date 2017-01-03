# CSV-to-VCF

`CSV-to-VCF` is a simple PHP script that converts a CSV file containing an export of contacts (from a mobile phone for example) to a single VCF file.

# Requirements

PHP and [Composer](https://getcomposer.org/).

# Installation

	$ git clone git@github.com:artifex404/csv-to-vcf.git
	$ cd csv-to-vcf
	$ composer install
	
# Usage

Your CSV file should have the format provided in `sample.csv` file. Otherwise, you will need to edit the column indexes of data in `csv-to-vcf.php` starting on line 34.

To convert your CSV file to a VCF file, copy your CSV file to the project and name it `contacts.csv` run:

	$ php csv-to-vcf.php
	
Your VCF file `contacts.vcf` will be created.