CREATE TABLE `feeds` (
`id` int(11) NOT NULL auto_increment,
`title` varchar(150) NOT NULL,
`url` varchar(250) NOT NULL,
`last_guid` varchar(250) NULL,
PRIMARY KEY  (`id`)
);