<?php

class CustomersTableSeeder extends Seeder
{

	public function run()
	{
	    DB::table('customers')->delete();
	    Customers::create(array(
			'first_name'    => 'Test Customer 01',
			'last_name'     => '',
			'email_address' => 'testcustomer01@theregistrytt.com',
			'password'      => Hash::make('test123'),
	    ));
	}

}
