SELECT			{ALIAS}.*, 
				CONCAT({ALIAS}.RevenueProjectTitle, '') AS {ENTITY}LookupCaption, 
				M.MemoTitle,
				'' AS _Other

FROM			{PREFIX}{NAME} AS {ALIAS}
	LEFT JOIN	ab_memo AS M ON M.MemoID  = {ALIAS}.MemoID
