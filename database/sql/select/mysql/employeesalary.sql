SELECT			{ALIAS}.*, 
				CONCAT({ALIAS}.EmployeeSalaryStatus, '') AS {ENTITY}LookupCaption, 
				E.EmployeeName, E.EmployeeDesignation,
				'' AS _Other

FROM			{PREFIX}{NAME} AS {ALIAS}
	LEFT JOIN	ab_employee AS E ON E.EmployeeID = {ALIAS}.EmployeeID

