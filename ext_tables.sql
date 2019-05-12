#
# Table structure for table 'tx_akgradientheadlines_domain_model_gradient'
#
CREATE TABLE tx_akgradientheadlines_domain_model_gradient (
	name varchar(255) DEFAULT '' NOT NULL,
	start_color varchar(255) DEFAULT '' NOT NULL,
	end_color varchar(255) DEFAULT '' NOT NULL,
	angle int(11) DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (

	gradient int(11) unsigned DEFAULT '0',

);
