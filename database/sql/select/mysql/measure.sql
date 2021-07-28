SELECT			{ALIAS}.*,
				CONCAT({ALIAS}T.{ENTITY}TypeName, ': ', {ALIAS}.{ENTITY}Name) AS {ENTITY}LookupCaption,

				{ALIAS}T.{ENTITY}TypeName,

				'' AS _Other

FROM			{PREFIX}{NAME} AS {ALIAS}
	LEFT JOIN	{PREFIX}{NAME}type AS {ALIAS}T ON {ALIAS}T.{ENTITY}TypeID = {ALIAS}.{ENTITY}TypeID
