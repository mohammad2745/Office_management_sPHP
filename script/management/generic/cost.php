<?php
namespace sPHP;

#region Entity management common configuration
$EM = new EntityManagement($Table[$Entity = "Cost"]);

# ImportField is used to Upload csv file for data insert, make sure all required fields.
$EM->ImportField([
	new Database\Field("" . ($Field = "Revenue") . "ID", "" . ($Column = "{$Field}Name") . "", null, $Table["{$Field}"], null),
]);

# InputValidation is used to input type validation & required fields.
$EM->InputValidation([
	new HTTP\InputValidation("RevenueID", true, VALIDATION_TYPE_INTEGER),
]);

# ValidateInput is used to check custom query input validation.
$EM->ValidateInput(function($Entity, $Database, $Table, $PrimaryKey, $ID){
	$Result = true;

	// $SalaryMonth = date('m', strtotime($_POST["EmployeeSalaryDate"]));
	// $SalaryYear = date('Y', strtotime($_POST["EmployeeSalaryDate"]));

	// if($Table->Get( // Check for duplicate values for UNIQUE columns
	// 	//Check same person have same address
	// 	"
	// 		(	
	// 			{$Table->Alias()}." . ($Column = "EmployeeID") . " = " . intval($_POST["{$Column}"]) . "
	// 			AND	MONTH (" . ($Column = "{$Entity}Date") . ") = " . $SalaryMonth . "
	// 			AND	YEAR (" . ($Column = "{$Entity}Date") . ") = " . $SalaryYear . "
	// 		)
	// 	"
	// , null, null, null, null, null, null))$Result = "This employee salary has been already paid !";

	return $Result;
});

#
$EM->ThumbnailColumn("x{$Entity}Picture");

# BeforeInput is used to check custom query before insert data into database.
$EM->BeforeInput(function($Entity, $Record){

	return true;
});

# IntermediateEntity is used to secondary entity inside primary entity.
$EM->IntermediateEntity("xCategory, xEvent");

# DefaultFromSearchColumn is used to set default search column.
$EM->DefaultFromSearchColumn("xTerminalID, xCustomerID, xCarrierID");

# ListColumn shows available datagrid with fields caption, fields value etc.
$EM->ListColumn([
  new HTML\UI\Datagrid\Column("{$Entity}" . ($Caption = "Title") . "", "{$Caption}", null),
	new HTML\UI\Datagrid\Column("{$Entity}" . ($Caption = "RevenueID") . "", "{$Caption}", null),
	new HTML\UI\Datagrid\Column("{$Entity}" . ($Caption = "Type") . "", "{$Caption}", null),
	new HTML\UI\Datagrid\Column("{$Entity}" . ($Caption = "TotalAmount") . "", "{$Caption}", null),
	new HTML\UI\Datagrid\Column("{$Entity}" . ($Caption = "Date") . "", "{$Caption}", null),
	new HTML\UI\Datagrid\Column("{$Entity}" . ($Caption = "Status") . "", "{$Caption}", null),
]);

# Action is an part of datagrid columns. It's show every records.
$EM->Action([
	new HTML\UI\Datagrid\Action("{$Environment->IconURL()}edit.png", null, $Application->URL($_POST["_Script"], "btnInput"), null, null, null, "Edit"),
	new HTML\UI\Datagrid\Action("{$Environment->IconURL()}delete.png", null, $Application->URL($_POST["_Script"], "btnDelete"), null, "return confirm('Are you sure to remove the information?');", null, "Delete"),
]);

# BatchActionHTML is used for bulk operation. Batch action button shows top of the List Columns.
$EM->BatchActionHTML([
	HTML\UI\Button("<img src=\"{$Environment->IconURL()}search.png\" alt=\"Search\" class=\"Icon\">Search", BUTTON_TYPE_SUBMIT, "btnSearch", true),
	HTML\UI\Button("<img src=\"{$Environment->IconURL()}add.png\" alt=\"Add new\" class=\"Icon\">Add new", BUTTON_TYPE_SUBMIT, "btnInput", true),
	HTML\UI\Button("<img src=\"{$Environment->IconURL()}delete.png\" alt=\"Remove\" class=\"Icon\">Remove", BUTTON_TYPE_SUBMIT, "btnDelete", true, "return confirm('Are you sure to remove the information?');"),
	HTML\UI\Button("<img src=\"{$Environment->IconURL()}export.png\" alt=\"Export\" class=\"Icon\">Export", BUTTON_TYPE_SUBMIT, "btnExport", true),
]);

# Configuration Section
$EM->OrderBy("{$Entity}Title"); # Order by fields
$EM->Order("ASC"); # Return record ASC / DESC
$EM->URL($Application->URL($_POST["_Script"])); # Current script URL
$EM->IconURL($Environment->IconURL()); # Icon URL
$EM->EncryptionKey($Application->EncryptionKey()); # Encryption Key
$EM->FieldCaptionWidth($Configuration["FieldCaptionWidth"]); # Set field caption width / by default it's configure in configuration file.
$EM->FieldCaptionInlineWidth($Configuration["FieldCaptionInlineWidth"]); # Set field caption inline width / by default it's configure in configuration file.
$EM->FieldContentFullWidth($Configuration["FieldContentFullWidth"]); # Set field caption width / by default it's configure in configuration file.
$EM->InputWidth($Configuration["InputWidth"]); # Set input field width / by default it's configure in configuration file.
$EM->InputInlineWidth($Configuration["InputInlineWidth"]); # Set input field inline width / by default it's configure in configuration file.
$EM->InputFullWidth($Configuration["InputFullWidth"]); # Set input field full width / by default it's configure in configuration file.
$EM->InputDateWidth($Configuration["InputDateWidth"]); # Set input date field width / by default it's configure in configuration file.
$EM->TempPath($Environment->TempPath()); # Set temporary path location
$EM->SearchInputPrefix($Configuration["SearchInputPrefix"]); # Set search input prefix
$EM->UploadPath($Environment->UploadPath()); # Set image uploaded path.
$EM->ThumbnailMaximumDimension(48); # Picture thumbnail dimension.
$EM->RecordsPerPage(200); //$Configuration["DatagridRowsPerPage"]
$EM->BaseURL($Environment->URL()); // ??????????? Base URL Location
#endregion Entity management common configuration

# Import Section
if(isset($_POST["btnImport"])){
	if(isset($_POST["btnSubmit"])){
		$EM->Import();
		$Terminal->Redirect($_POST["_Referer"]);
	}

	print $EM->ImportHTML();
}

# Bulk Delete / Delete an Record
if(isset($_POST["btnDelete"])){
	$EM->Delete();
	$Terminal->Redirect($_SERVER["HTTP_REFERER"]);
}

# Insert / Update record into database
if(isset($_POST["btnInput"])){
	$NewRecordMode = isset($_POST["{$Entity}ID"]) && intval($_POST["{$Entity}ID"]) ? false : true;

	if(isset($_POST["btnSubmit"])){
		#endregion Custom code
		// $_POST["EmployeeSalaryDate"] = date("Y-m-d");
		#region Custom code
		// debugdump($_POST);

		if($EM->Input()){
			$Terminal->Redirect("{$_POST["_Referer"]}&SucceededAction=Input"); // Redirect to previous location
		}
	}

	$EM->LoadExistingData();
	#region Custom code
	#endregion Custom code

	# Input Form Section
	$EM->InputUIHTML([
		HTML\UI\Field(HTML\UI\Select("" . ($Caption = "Revenue") . "ID", $Table[$OptionEntity = "{$Caption}"]->Get("{$Table["{$OptionEntity}"]->Alias()}.{$OptionEntity}IsActive = 1", "{$OptionEntity}LookupCaption ASC"), null, "{$OptionEntity}LookupCaption"), "{$Caption}", null, null, $EM->FieldCaptionWidth()),
		HTML\UI\Field(HTML\UI\Input("{$Entity}" . ($Caption = "Title") . "", $EM->InputWidth(), null, true), "{$Caption}", true, null, $EM->FieldCaptionWidth()),
		HTML\UI\Field(HTML\UI\Select("{$Entity}" . ($Caption = "Type") . "", [new Option(), new Option("External Payments", "External Payments"), new Option("Server Purchase", "Server Purchase"), ]), "{$Caption}", true, null, $EM->FieldCaptionWidth()),
		HTML\UI\Field(HTML\UI\Input("{$Entity}" . ($Caption = "Date") . "", $EM->InputWidth(), DATE("Y-m-d"), null, INPUT_TYPE_DATE), "{$Caption}", true, null, $EM->FieldCaptionWidth()),
		HTML\UI\Field(HTML\UI\Input("{$Entity}" . ($Caption = "VoucherNo") . "", $EM->InputWidth(), null, null), "{$Caption}", true, null, $EM->FieldCaptionWidth()),
		HTML\UI\Field(HTML\UI\Input("{$Entity}" . ($Caption = "Total") . "Amount", $EM->InputWidth(), null, null), "{$Caption}", true, null, $EM->FieldCaptionWidth()),
		HTML\UI\Field(HTML\UI\Select("{$Entity}" . ($Caption = "Status") . "", [new Option(), new Option("Cancelled", "Cancelled"), new Option("Completed", "Completed"), new Option(), new Option("Refunded", "Refunded"), new Option("Pending Payment", "Pending Payment"), ]), "{$Caption}", true, null, $EM->FieldCaptionWidth()),
    // HTML\UI\Field(HTML\UI\Input("{$Entity}" . ($Caption = "Total") . "Amount", $EM->InputWidth(), null, null, null, null, null, null, "{$Entity}TotalAmount", null, null, null, true), "{$Caption}", true, null, $EM->FieldCaptionWidth()),
  ]);

	# Print the input form
	print $EM->InputHTML();
}

# Sql Search Section
$EM->SearchSQL([
	"1 = 1", // Custom fixed search condition
	SetVariable("{$Configuration["SearchInputPrefix"]}" . ($Column = "RevenueID") . "", SetVariable($Column)) ? "{$Table["{$Entity}"]->Alias()}.{$Column} = " . intval($_POST["{$Configuration["SearchInputPrefix"]}{$Column}"]) . "" : null,
]);

# Searching form html
$EM->SearchUIHTML([
  HTML\UI\Field(HTML\UI\Select("{$Configuration["SearchInputPrefix"]}" . ($Caption = "Revenue") . "ID", $Table[$OptionEntity = "{$Caption}"]->Get(null, "" . ($OptionEntityOrderBy = "{$OptionEntity}LookupCaption") . " ASC"), new Option(), "{$OptionEntityOrderBy}"), "{$Caption}", null, null),

]);

# Export data section
if(isset($_POST["btnExport"])){
	$Application->DocumentType(DOCUMENT_TYPE_CSV, true); // Set output type and clear any previous output
	$Terminal->DocumentName("{$Entity}_" . date("Y-m-d_H-i-s") . ".csv"); // Set client side default file name

	print $Table["{$Entity}"]->Export(
		"PersonName, {$Entity}Name, {$Entity}Street, {$Entity}City, {$Entity}State, {$Entity}Zip, CountryName", # Column name
		str_replace(" ", null, "Person, Street, City, State, Zip, Country"), # Column Value
		IMPORT_TYPE_CSV, null, $EM->SearchSQL(), "{$_POST["OrderBy"]} {$_POST["Order"]}"
	);

	$Terminal->Suspended(true); // Suspend any further output
}

# Print list items
print "{$EM->ListHTML()}";
if(SetVariable("SucceededAction") == "Input")print HTML\UI\Toast("{$Table["{$Entity}"]->FormalName()} input successful.");
#region List
?>


