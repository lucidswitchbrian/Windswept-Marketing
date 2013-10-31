<?php
/*
* Date: 08/16/2013
* Auth: Toan Dang, toan@lucidswitch.com
* Desc: Emptied starter rule for automation
* Mods: DJ input rules 1-31 on 08/16/2013
* BW Updating ability to input Sales Order Rules - 9/13/2013
* DJ Rearranged rules & input Rules 1-3,10,12-13, 30-37
* BW opened up file to check error 10/22
*/

$config_rules = array(
"Private::Crm::SalesLead" => array(
	
		array(
			"rule_id" => 4,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Attempted to Contact MC",
			"rule_desc" => "Sets up a FU",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead Status IS Attempted to Contact MC",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "Attempted to Contact MC",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU on Attempt to Contact MC 1',
						'description' => 'FU on Attempt to Contact MC 1 in 5 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+5 days',
					),
				),
			),
		),
		
	array(
			"rule_id" => 5,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Attempted to Contact x2 MC",
			"rule_desc" => "setting up FU and email to lead after 2nd time trying to contact them",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead Status IS Attempted to Contact x2 MC",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "Attempted to Contact x2 MC",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU on Attempt to Contact x2 MC',
						'description' => 'FU on Attempt to Contact x2 MC in 3 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Attempted to Contact x2 MC',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@org_lead_party[main_location[email]]@', // client email to be looked up via client ID
						'template' => 'Attempted to Contact x2 MC',
					),
				),
			),
		),
		
	array(
			"rule_id" => 6,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Contacted - IA Brochure Requested",
			"rule_desc" => "let the admin know that a lead has requested the IA Brochure",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead Status IS Contacted - IA Brochure Requested",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "Contacted - IA Brochure Requested",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
                        'params' => array(	
						'name' => 'FU on Lead Brochure Sent',
						'description' => 'FU on Lead Brochure Sent - 7 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+7 days',
					),
				),
				array(
					// Send alert to Admin
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'IA Brochure Requested',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@admin@windswept.com@', // client email to be looked up via client ID
						'template' => 'IA Brochure Requested',
					),
				),
			),
		),
		
	array(
			"rule_id" => 7,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "FU in Future",
			"rule_desc" => "when lead status is first set to FU in future, 
			set up a task to FU in 6 months",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead Status IS FU in Future",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "FU in Future",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU in 6 months',
						'description' => 'FU in 6 months',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+6 months',
					),
				),
			),
		),
		
		array(
			"rule_id" => 8,
 			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Preliminary Follow Up",
			"rule_desc" => "create a follow up for sales",
			"exec_on" => "Create or Edit",
            "criteria_desc" => "Stage IS Preliminary",
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "opportunity_stage[name]",
			"value" => "(1) Preliminary",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU on Preliminary - Future Project',
						'description' => 'FU on Preliminary in 5 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+30 days',
					),
				),
			),
		),
		
	array(
			"rule_id" => 9,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "FU on PO",
			"rule_desc" => "when the stage is udpdated to waiting on po, there should be a FU set",
			"exec_on" => "Edit",
            "criteria_desc" => "Stage IS Waiting on PO",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "opportunity_stage[name]",
			"value" => "(9) Waiting on PO",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU in 2 days on PO',
						'description' => 'FU in 2 days on PO',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+2 days',
					),
				),
			),
		),
		
		array(
			"rule_id" => 13,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Update Opp Artwork Field When Proof Accepted",
			"rule_desc" => "when the artwork is accepted, the Home Office should 
			update the product record (artwork) with the new product art",
			"exec_on" => "Edit",
            "criteria_desc" => "Artwork IS Proof Accepted",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_customer_quotation_artwork",
			"value" => "Proof Accepted",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'Update the Artwork field',
						'description' => 'Update the Artwork field in Opportunity',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
			),
		),
		
		array(
			"rule_id" => 14,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Attempted to Contact BL",
			"rule_desc" => "Sets up a FU ",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead Status IS Attempted to Contact BL",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "Attempted to Contact BL",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU with Attempted to Contact BL',
						'description' => 'FU in 5 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+5 days',
					),
				),
			),
		),
		
	array(
			"rule_id" => 15,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Attempted to Contact x2 BL",
			"rule_desc" => "setting up FU and email to lead after 2nd time trying to contact them",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead Status IS Attempted to Contact x2 BL",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "Attempted to Contact x2 BL",
			),
     		//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU with Contactx2',
						'description' => 'FU with Contactx2 in 3 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Attempted to Contact x2 BL',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@org_lead_party[main_location[email]]@', // client email to be looked up via client ID
						'template' => 'Attempted to Contact x2 BL',
					),
				),
			),
		),
		
	array(
			"rule_id" => 16,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Attempted to Contact x3 BL",
			"rule_desc" => "setting up FU and email to lead after 2nd time trying to contact them",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead Status IS Attempted to Contact x3 BL",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "Attempted to Contact x3 BL",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU with Attempted to Contact x3 BL',
						'description' => 'FU in 120 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+120 days',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'TBD',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@org_lead_party[main_location[email]]@', // client email to be looked up via client ID
						'template' => 'Attempted to Contact x3 BL',
					),
				),
			),
		),
		
	array(
			"rule_id" => 17,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Requested FU",
			"rule_desc" => "when a baseline client has no immediate need, but has requested a 
			FU for the future based on when the need exists, they should get an email as well 
			as set up a task for sales to fu in future",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead status IS Requested FU",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "Requested FU",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU with Baseline',
						'description' => 'FU with Baseline FU Request and add in description - this task defaults to 1 month. Please review your lead notes to set the task to the appropriate time.',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+30 days',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'TBD',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@org_lead_party[main_location[email]]@', // client email to be looked up via client ID
						'template' => 'Requested FU Baseline Lead',
					),
				),
			),
		),
		
		array(
			"rule_id" => 18,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Waiting on Artwork",
			"rule_desc" => "when the stage is set to Waiting on Artwork create a 
			FU task and sends out the Artwork Requested email",
			"exec_on" => "Create or Edit",
            "criteria_desc" => "Stage IS Waiting on Artwork",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "opportunity_stage[name]",
			"value" => "(10) Waiting on Artwork",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU on Artwork',
						'description' => 'FU on Artwork in 2 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+2 days',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Artwork Request for Production',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@party.name@', // client email to be looked up via client ID
						'template' => 'Artwork Requests',
					),
				),
			),
		),
		

		array(
			"rule_id" => 20,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Attempted to Contact TK",
			"rule_desc" => "Sets up a FU",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead Status IS Attempted to Contact TK",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "Attempted to Contact TK",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU with Attempted to Contact TK',
						'description' => 'FU in 5 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+5 days',
					),
				),
			),
		),
		
	array(
			"rule_id" => 21,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Attempted to Contact x2 TK",
			"rule_desc" => "setting up FU and email to lead after 2nd time trying to contact them",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead Status IS Attempted to Contact x2 TK",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "Attempted to Contact x2 TK",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU with Attempted to Contact x2 TK',
						'description' => 'FU in 3 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'TBD',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@org_lead_party[main_location[email]]@', // client email to be looked up via client ID
						'template' => 'Attempted to Contact x2 TK',
					),
				),
			),
		),
		
	array(
			"rule_id" => 22,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Attempted to Contact x3 TK",
			"rule_desc" => "setting up FU and email to lead after 2nd time trying to contact them",
			"exec_on" => "Edit",
            "criteria_desc" => "Lead Status IS Attempted to Contact x3 TK",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "sales_lead_status_type",
			"value" => "Attempted to Contact x3 TK",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU with Attempted to Contact x3 TK',
						'description' => 'FU in 120 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+120 days',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'TBD',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@org_lead_party[main_location[email]]@', // client email to be looked up via client ID
						'template' => 'Attempted to Contact x3 TK',
					),
				),
			),
		),
		
		array(
			"rule_id" => 23,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Product Line Meeting",
			"rule_desc" => "email to prospect confirming the date and time of the meeting",
			"exec_on" => "Create",
            "criteria_desc" => "Event Type IS Product Line Meeting",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_event_type",
			"value" => "Product Line Meeting",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Windswept Marketing Meeting',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@party_id@', // client email to be looked up via client ID
						'template' => 'Product Line Meeting',
					),
				),
			),
		),
	
		
		array(
			"rule_id" => 27,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Waiting on PO - Sales Order",
			"rule_desc" => "when the Sales order Status is udpdated to waiting 
			on po, there should be a FU set",
			"exec_on" => "Create or Edit",
            "criteria_desc" => "Sales order Status IS Closed Waiting ON PO",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_sales_order_sales_order_status",
			"value" => "Closed Waiting ON PO",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task_for_sales_order_owner',
					'params' => array(	
						'name' => 'FU in 2 days on PO',
						'description' => 'FU in 2 days on PO',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+2 days',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => '___',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => 'jenene@windsweptmarketing.com', // client email to be looked up via client ID
						'template' => '___',
					),
				),
			),
		),
		
	array(
			"rule_id" => 28,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "PO Processed",
			"rule_desc" => "When sales order status is set to po processed, 
			create a task for OP to FU on the Oder",
			"exec_on" => "Edit",
            "criteria_desc" => "Sales Order Status IS PO Processed",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_sales_order_sales_order_status",
			"value" => "PO Processed",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU on Sewout from Vendor in 3 days',
						'description' => 'FU on Sewout from Vendor in 3 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
			),
		),
		
	array(
			"rule_id" => 29,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Waiting on Approval - Sales Order Sew Out",
			"rule_desc" => "set up a task for the record owner to FU on the sew out proof",
			"exec_on" => "edit",
            "criteria_desc" => "Sales Order Status IS Waiting on Approval",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_sales_order_sales_order_status",
			"value" => "Waiting on Approval",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task_for_record_owner',
					'params' => array(	
						'name' => 'FU On Sew Out Approval in 3 days',
						'description' => 'FU On Sew Out Approval in 3 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
			),
		),
		
	array(
			"rule_id" => 30,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Waiting on Sew Out Edit",
			"rule_desc" => "create a reminder to FU with factory on the sew out edit",
			"exec_on" => "edit",
            "criteria_desc" => "Sales Order Status IS Waiting On Sew Out Edit",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_sales_order_sales_order_status",
			"value" => "Waiting On Sew Out Edit",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task_for_Operations',
					'params' => array(	
						'name' => 'FU on Sew out Edit in 3 days',
						'description' => 'Operations to FU on Sew out Edit in 3 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
			),
		),
		
	array(
			"rule_id" => 31,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Expected Arrival of Product",
			"rule_desc" => "send out an email to the client and the sales order owner 
			letting them know the tracking number and the expected arrival date have 
			been created",
			"exec_on" => "edit",
            "criteria_desc" => "tracking number && ETD are NOT empty",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			"field" => array("cf_sales_order_tracking_number","cf_sales_order_ETD"),
			"crit" => array("ne","ne"),
			"value" => array(" "," "),
			),
			//create the actions for the rule
			"actions" => array(
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert_to_Client',
					'params' => array(
						'subject' => 'Tracking number for PO Number',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@party_id@', // client email to be looked up via client ID
						'template' => 'Tracking number email to client',
					),
				),
				array(
					// Send alert to sales
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Sales - Tracking number for PO Number',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => 'orders@windsweptmarketing.com', // client email to be looked up via client ID
						'template' => 'Tracking number email to sales',
					),
				),
			),
		),
		
		array(
			"rule_id" => 32,
 			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Sew Out Recieved",
			"rule_desc" => "when Artwork is changed in quote, we need to update 
			it in the Opportunity that is related to it",
			"exec_on" => "Edit",
            "criteria_desc" => "Artwork IS Sew Out Received",
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_customer_quotation_artwork",
			"value" => "Sew Out Received",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'Update Artwork in',
						'description' => 'Update Artwork in related Opportunity to Sew Out Received',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
			),
		),
		array(
			"rule_id" => 36,
			"active" => 0, // Active:1; Not-Active: 0
            "rule_name" => "Secure P.O.",
			"rule_desc" => "if it is 3 days after the closed date, 
			and the PO Received checkbox is not ticked, create a task 
			to FU on PO for Opportunity Name",
			"exec_on" => "Edit",
            "criteria_desc" => "PO Received IS NOT YES",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			"field" => array("cf_opportunity_po_received","close date here", "stage here"),
			"crit" => array("ne","3 days prior here","eq"),
			"value" => array("Yes","","(6) Closed Won"),
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU with Apparel Shipment',
						'description' => 'Create a Task to FU on PO for @cf_customer_quotation_contact_name@',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
			),
		),
	),   // end sales leads
	
	"Private::Crm::Opportunity" => array (
		array(
			"rule_id" => 8,
 			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Preliminary Follow Up",
			"rule_desc" => "create a follow up for sales",
			"exec_on" => "Create or Edit",
            "criteria_desc" => "Stage IS Preliminary",
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "opportunity_stage[name]",
			"value" => "(1) Preliminary",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU on Preliminary',
						'description' => 'FU on Preliminary in 5 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+5 days',
					),
				),
			),
		),
		
		
	array(
			"rule_id" => 10,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Waiting on Artwork - Sales Order",
			"rule_desc" => "when the stage is set to Waiting on Artwork create a 
			FU task and sends out the Artwork Requested email",
			"exec_on" => "Create or Edit",
            "criteria_desc" => "Artwork IS Waiting On",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_opportunity_artwork",
			"value" => "Waiting On",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU on Artwork',
						'description' => 'FU on Artwork in 2 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+2 days',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Artwork Request for Production',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@cf_opportunity_contact_email@', // client email to be looked up via client ID
						'template' => 'Artwork Request',
					),
				),
			),
		),	
	),
	
	
	"Private::Accounting::SalesOrder" => array(
	array(
			"rule_id" => 1,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "CDP Sent",
			"rule_desc" => "when the tracking number has been filled in and the status 
			is updated to CDP Sent, the Home Office will get an email to check the sales 
			order, and the client will get an email letting them know that the order has 
			been shipped with the tracking number",
			"exec_on" => "Edit",
            "criteria_desc" => "Tracking number is NOT Empty && CDP Status IS CDP Sent",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			"field" => array("cf_customer_order_tracking_number","cf_customer_order_cdp_status"),
			"crit" => array("ne","eq"),
			"value" => array("","CDP Sent"),
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'Sales to FU with CDP Sent',
						'description' => 'Sales to FU with CDP Sent in 5 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+5 days',
					),
				),
				array(
					// Send alert to home office
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Generate and Send Out an Invoice',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => 'jenene@windsweptmarketing.com', // client email to be looked up via client ID
						'template' => 'Invoice Requested',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Windswept Marketing Order Tracking Number',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@cf_customer_order_contact_email@', // client email to be looked up via client ID
						'template' => 'Tracking number email',
					),
				),
			),
		),
		
		array(
			"rule_id" => 2,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Tracking Number Not Filled In",
			"rule_desc" => "if production updates the status to CDP sent, and the 
			tracking number is not filled in, he'll get an email telling him he forgot 
			to put the tracking number in place",
			"exec_on" => "Edit",
            "criteria_desc" => "Tracking Number is Empty && Status is CDP Sent",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			"field" => array("cf_customer_order_tracking_number","cf_customer_order_cdp_status"),
			"crit" => array("eq","eq"),
			"value" => array("","CDP Sent"),
			),
			//create the actions for the rule
			"actions" => array(
				array(
					// Send alert to production
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Tracking Number not input for order sent',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => 'production@windsweptmarketing.com', // client email to be looked up via client ID
						'template' => 'Forgot Tracking Number - SO',
					),
				),
			),
		),
		
		array(
			"rule_id" => 34,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "FU on Apparel Shipment",
			"rule_desc" => "create an alert for sales to FU with the Apparel Shipment on a CDP",
			"exec_on" => "Edit",
            "criteria_desc" => "IE Sent Date IS NOT empty && CDP Status is Create CDP",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			"field" => "cf_customer_order_ie_sent_date","cf_customer_order_cdp_status",
			"crit" => "ne","eq",
			"value" => "","Create CDP",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU with Apparel Shipment',
						'description' => 'Sales to FU on Apparel Shipment for @cf_customer_quotation_contact_name@',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+0 days',
					),
				),
			),
		),
	
	),//end Sales Order
	
	"Private::Accounting::Quotation" => array(
	array(
			"rule_id" => 12,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "New Art Sent",
			"rule_desc" => "When a new artwork is received for the creation of a CDP, 
			send an alert to the Home Office to add the artwork into the Product List, 
			and then finalize the sales order by adding the product into it.",
			"exec_on" => "Edit",
            "criteria_desc" => " Artwork IS Sent To Quoting Dept.",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_customer_quotation_artwork",
			"value" => "Sent to Quoting Dept",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'Send artwork to factory',
						'description' => 'There is new product artwork to go to factory',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+0 days',
						'assigned_to' => 'quotes@windsweptmarketing.com',
					),
				),
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU on Sew Out Proof in 3 days',
						'description' => 'FU on Sew Out Proof',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
				array(
					// Send alert to home office
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Need New Art Pricing',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => 'quotes@windsweptmarketing.com', 
						'template' => 'New Art Pricing',
					),
				),
			),
		),
		
		array(
			"rule_id" => 37,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Email Sew Out",
			"rule_desc" => "when email sew out url is filled in, 
			and the artwork is sew out received, send out the email sew out proof template",
			"exec_on" => "edit or UPDATE",
            "criteria_desc" => "Artwork IS Sew Out Received && Email Sew Out URL IS NOT empty",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_customer_quotation_artwork","cf_customer_quotation_email_sew_out_url",
			"criteria" => "eq","ne",
			"value" => "Sew Out Received","",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'Update the Email Sew Out URL field',
						'description' => 'Update the Email Sew Out URL field in the related Opportunity',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+0 days',
					),
				),
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Your Pre Production Proof',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@cf_customer_quotation_contact_email@', // client email to be looked up via client ID
						'template' => 'Sew Out Proof - Quote',
					),
				),
				array(
					// Send alert to sales
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Your Prospects Pre Production Proof',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@owner[login_name]@', // client email to be looked up via client ID
						'template' => 'Sew Out Proof - Quote Sales',
					),
				),
			),
		),
		
		array(
			"rule_id" => 33,
 			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Artwork Needs Edit",
			"rule_desc" => "when artwork requires an edit to happen, send a task to the quoting person",
			"exec_on" => "Edit",
            "criteria_desc" => "Artwork IS Needs Edit",
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_customer_quotation_artwork",
			"value" => "Needs Edit",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'Artwork Proof Requires Edit',
						'description' => 'create a task for quoting - Artwork Proof 
						Requires Edit for @cf_customer_quotation_contact_name@',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+0 days',
						'assigned_to' => 'jenene@windsweptmarketing.com',
					),
				),
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'Update Artwork Placeholder task',
						'description' => 'Update Artwork field in related opportunity to Needs Edit',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
			),
		),
		array(
			"rule_id" => 3,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Create CDP",
			"rule_desc" => "operations gets notified to get the sample 
			indirect embroideries to the production facility",
			"exec_on" => "Edit",
            "criteria_desc" => "Stage IS Create CDP",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_customer_quotation_cdp_status",
			"value" => "Create CDP",
			),			
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'Create CDP',
						'description' => 'Jenene  - Create CDP',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
						'assigned_to' => 'jenene@windsweptmarketing.com',
					),
				),
	
				array(
					// Send alert to client
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
						'subject' => 'Creating Your Custom Design Prototype',
						'from_address' => '@owner[login_name]@',
						//'to_addresses' => '@party.name@',
						'to_addresses' => '@cf_customer_quotation_contact_email@',
						'template' => 'Apparel Needed',
					), 
				),
				
				array(
					// Send alert to production
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
					'subject' => 'New Client CDP',						      
                   'from_address' => '@owner[login_name]@',
					'to_addresses' => 'production@windsweptmarketing.com', // client email to be looked up via client ID
				 	'template' => 'New Client CDP',
					),
				),
 			),
		),
		
		array(
			"rule_id" => 35,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "PO Received",
			"rule_desc" => "once the actual po is received send an email to 
			operations asking them to send out the Sales Order",
			"exec_on" => "Edit",
            "criteria_desc" => "PO Received field is yes or override",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			"field" => "cf_customer_quotation_po_received",
			"crit" => "in",
			"value" => array("Yes","Override"),
			),
			//create the actions for the rule
			"actions" => array(
				array(
					// Send alert to operations
					'active' => 1,
					'action' => 'send_alert',
					'params' => array(
					'subject' => 'Send Sales Order',						      
                   'from_address' => '@owner[login_name]@',
					'to_addresses' => 'operations@windsweptmarketing.com', // client email to be looked up via client ID
				 	'template' => 'Send Sales Order',
					),
				),
			),
		),
		array(
			"rule_id" => 24,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Delivered",
			"rule_desc" => "Create a task to FU with client in 3 days on quote",
			"exec_on" => "Create or Edit",
            "criteria_desc" => "Quote Stage IS Delivered",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_customer_quotation_quote_stage",
			"value" => "Delivered",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU on Quote for @description@',
						'description' => 'Quote Owner to FU in 3 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
			),
		),
			array(
			"rule_id" => 25,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Revising Quote",
			"rule_desc" => "Create a task to Send out new quote",
			"exec_on" => "Create or Edit",
            "criteria_desc" => "Quote Stage IS Revising Quote",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_customer_quotation_quote_stage",
			"value" => "Revising Quote",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'Create New Quote for @description@',
						'description' => 'Quote Owner to create new quote in 1 day',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+1 days',
					),
				),
			),
		),
		array(
			"rule_id" => 26,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Revised Quote Sent",
			"rule_desc" => "Create a task to FU with client in 3 days on quote",
			"exec_on" => "Create or Edit",
            "criteria_desc" => "Quote Stage IS Revised Quote Sent",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_customer_quotation_quote_stage",
			"value" => "Revised Quote Sent",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'create_task',
					'params' => array(	
						'name' => 'FU in 3 days on revised quote @description@',
						'description' => 'Quote Owner to FU in 3 days',
						'activity_priority' => 'Medium',
						'activity_status' => 'New',
						'activity_type' => 'To-do',
						'due_date' => '+3 days',
					),
				),
			),
		),
		// end quotation
	),
	"Private::Accounting::PurchaseOrder" => array(
	array(
			"rule_id" => 38,
			"active" => 1, // Active:1; Not-Active: 0
            "rule_name" => "Supplier Order Tracking Number",
			"rule_desc" => "when tracking is filled into the supplier order, update the sales order with the 
			tracking number, and send out an email to the client using the Supplier Order Tracking Number email template",
			"exec_on" => "Create or Edit",
            "criteria_desc" => "tracking number is NOT Empty",
			//provide the criteria for the rule if multiple criteria
			"criteria" => array(
			//provide criteria for the rule if only a single criteria exists
			"field" => "cf_supplier_order_tracking_number",
			"crit" => "ne",
			"value" => "",
			),
			//create the actions for the rule
			"actions" => array(
				array(
					'action' => 'send_alert',
					'params' => array(	
						'subject' => 'Your Product Has Been Shipped',
						'from_address' => '@owner[login_name]@',
						'to_addresses' => '@cf_supplier_order_contact_email@', // client email to be looked up via client ID
						'template' => 'Supplier Order Tracking Number',
					),
				),
			),
		),
	
),
);


?>