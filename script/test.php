<?php
namespace sPHP;
// echo DebugDump([$Database]);
// echo DebugDump($Environment->Utility()->Debug());
// echo DebugDump($Environment->Version()->Major());
// echo DebugDump($Accordion);

$Subject = [
    "Registration" => [
        "Data" => [
            "Field" => [
                "Check" => "CarrierExpiryRegistration",
                "Period" => "RegistrationDaysToExpire",
            ],
        ],
        "Caption" => [
            "Main" => "Registration",
            "Suffix" => [
                "Past" => "expired",
                "Future" => "expiry",
            ],
        ],
        "Message" => [
            "Past" => [
                //"Operator" => null,
                "Customer" => "Registration for %ProviderCode%%TerminalAssignmentCode%, %CarrierName% has expired on %CarrierExpiryRegistration%.",
            ],
            "Future" => [
                //"Operator" => null,
                "Customer" => "Registration for %ProviderCode%%TerminalAssignmentCode%, %CarrierName% will expire on %CarrierExpiryRegistration%.",
            ],
        ],
        "Period" => [7, 14, 21, 27],
        "Notification" => [
            "Count" => 0,
        ],
    ],
    "Tax" => [
        "Data" => [
            "Field" => [
                "Check" => "CarrierExpiryTax",
                "Period" => "TaxDaysToExpire",
            ],
        ],
        "Caption" => [
            "Main" => "Tax",
            "Suffix" => [
                "Past" => "expired",
                "Future" => "expiry",
            ],
        ],
        "Message" => [
            "Past" => [
                //"Operator" => null,
                "Customer" => "Tax for %ProviderCode%%TerminalAssignmentCode%, %CarrierName% has expired on %CarrierExpiryTax%.",
            ],
            "Future" => [
                //"Operator" => null,
                "Customer" => "Tax for %ProviderCode%%TerminalAssignmentCode%, %CarrierName% will expire on %CarrierExpiryTax%.",
            ],
        ],
        "Period" => [7, 14, 21, 27],
        "Notification" => [
            "Count" => 0,
        ],
    ],
    "Fitness" => [
        "Data" => [
            "Field" => [
                "Check" => "CarrierExpiryFitness",
                "Period" => "FitnessDaysToExpire",
            ],
        ],
        "Caption" => [
            "Main" => "Fitness",
            "Suffix" => [
                "Past" => "expired",
                "Future" => "expiry",
            ],
        ],
        "Message" => [
            "Past" => [
                //"Operator" => null,
                "Customer" => "Fitness for %ProviderCode%%TerminalAssignmentCode%, %CarrierName% has expired on %CarrierExpiryFitness%.",
            ],
            "Future" => [
                //"Operator" => null,
                "Customer" => "Fitness for %ProviderCode%%TerminalAssignmentCode%, %CarrierName% will expire on %CarrierExpiryFitness%.",
            ],
        ],
        "Period" => [7, 14, 21, 27],
        "Notification" => [
            "Count" => 0,
        ],
    ],
    "RoutePermit" => [
        "Data" => [
            "Field" => [
                "Check" => "CarrierExpiryRoutePermit",
                "Period" => "RoutePermitDaysToExpire",
            ],
        ],
        "Caption" => [
            "Main" => "Route permit",
            "Suffix" => [
                "Past" => "expired",
                "Future" => "expiry",
            ],
        ],
        "Message" => [
            "Past" => [
                //"Operator" => null,
                "Customer" => "Route permit for %ProviderCode%%TerminalAssignmentCode%, %CarrierName% has expired on %CarrierExpiryRoutePermit%.",
            ],
            "Future" => [
                //"Operator" => null,
                "Customer" => "Route permit for %ProviderCode%%TerminalAssignmentCode%, %CarrierName% will expire on %CarrierExpiryRoutePermit%.",
            ],
        ],
        "Period" => [7, 14, 21, 27],
        "Notification" => [
            "Count" => 0,
        ],
    ],
    "CNGSystem" => [
        "Data" => [
            "Field" => [
                "Check" => "CarrierExpiryCNGSystem",
                "Period" => "CNGSystemDaysToExpire",
            ],
        ],
        "Caption" => [
            "Main" => "CNG system",
            "Suffix" => [
                "Past" => "expired",
                "Future" => "expiry",
            ],
        ],
        "Message" => [
            "Past" => [
                //"Operator" => null,
                "Customer" => "CNG system for %ProviderCode%%TerminalAssignmentCode%, %CarrierName% has expired on %CarrierExpiryCNGSystem%.",
            ],
            "Future" => [
                //"Operator" => null,
                "Customer" => "CNG system for %ProviderCode%%TerminalAssignmentCode%, %CarrierName% will expire on %CarrierExpiryCNGSystem%.",
            ],
        ],
        "Period" => [7, 14, 21, 27],
        "Notification" => [
            "Count" => 0,
        ],
    ],
];

$RecordSet = file_get_contents(__DIR__."/pnl_carrier.json");
$json_a = json_decode($RecordSet, true);
var_dump($json_a);
$dir = realpath(dirname(__FILE__));
// foreach (scandir($dir) as $key) {
// 	echo $key;
// 	echo "<br>";
// }
$MaximumPeriod = 0;
foreach($Subject as $ThisSubject)if(($SubjectMaximumPeriod = max($ThisSubject["Period"])) > $MaximumPeriod)$MaximumPeriod = $SubjectMaximumPeriod;
print $MaximumPeriod;
foreach($Subject as $SubjectKey => $ThisSubject){
	echo $ThisSubject["Data"]["Field"]["Check"]];
}
?>