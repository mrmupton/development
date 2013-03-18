<?php     

require_once('dataGrid.class.php');
require_once('dataObject.class.php');         
                    
// create a new dataGridOutput object
$grid = new dataGridOutput();
/* 
*  Add columns. The first argument of addColumn is the name of the field in the databse. 
*  The second argument is the label that will be displayed in the header
*/
$grid->addColumn('id', 'ID', 'integer', NULL, false); 
$grid->addColumn('name', 'Name', 'string');  
$grid->addColumn('firstname', 'Firstname', 'string');  
$grid->addColumn('age', 'Age', 'integer');  
$grid->addColumn('height', 'Height', 'float');  
/* The column id_country and id_continent will show a list of all available countries and continents. So, we select all rows from the tables */
$grid->addColumn('continent', 'Continent', 'string' , fetch_pairs('SELECT id, name FROM continent'),true);  
$grid->addColumn('country', 'Country', 'string', fetch_pairs('SELECT id, name FROM country'),true );  
$grid->addColumn('email', 'Email', 'email');                                               
$grid->addColumn('freelance', 'Freelance', 'boolean');  
$grid->addColumn('lastvisit', 'Lastvisit', 'date');  
$grid->addColumn('website', 'Website', 'string');
// action column ("html" type), not editable
$grid->addColumn("action", "", "html", NULL, false);

// send data to the browser
$stmt = new dataObjectResult('SELECT *, date_format(lastvisit, "%d/%m/%Y") as lastvisit FROM demo');
$result = $stmt->result;
$grid->renderJSON($result);
?>