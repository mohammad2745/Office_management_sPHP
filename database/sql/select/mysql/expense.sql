SELECT			{ALIAS}.*, 
				CONCAT({ALIAS}.ExpenseTitle, '') AS {ENTITY}LookupCaption, 
				E.MemoTitle,
				'' AS _Other

FROM			{PREFIX}{NAME} AS {ALIAS}
	LEFT JOIN		ab_memo AS E ON E.MemoID = {ALIAS}.MemoID

