SELECT			{ALIAS}.*, 
				CONCAT({ALIAS}.CostTitle, '') AS {ENTITY}LookupCaption, 
				R.RevenueProjectTitle,
				'' AS _Other

FROM			{PREFIX}{NAME} AS {ALIAS}
	LEFT JOIN		ab_revenue AS R ON R.RevenueID = {ALIAS}.RevenueID
