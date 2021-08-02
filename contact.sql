DROP TABLE IF EXISTS ab_employee, ab_employeesalary;

CREATE TABLE ab_employee (
	EmployeeID INT(11) PRIMARY KEY AUTO_INCREMENT, 
    EmployeeName VARCHAR(255) NULL,
    EmployeeBirthDate DATE NULL,
    EmployeeFatherName VARCHAR(255) NULL,
    EmployeeMotherName VARCHAR(255) NULL, 
    EmployeeNid INT(20) NULL,
    EmployeeMobileNo1 INT(20) NULL,
    EmployeeMobileNo2 INT(20) NULL,
    EmployeeEmail1 VARCHAR(255) NULL, 
    EmployeeEmail2 VARCHAR(255) NULL,  
    EmployeePresentAddress VARCHAR(255) NULL,
    EmployeePermanentAddress VARCHAR(255) NULL,
    EmployeeJoiningDate DATE NULL,
    EmployeeDesignation VARCHAR(255) NULL,
    EmployeeBloodGroup VARCHAR(5) NULL,
    EmployeeReferenceName VARCHAR(255) NULL,
    EmployeeReferenceMobileNo INT(20) NULL,
    EmployeeReferenceEmail VARCHAR(255) NULL, 
    EmployeeIsActive INT(11) NULL,
    UserIDInserted INT(11) NULL, 
    UserIDUpdated INT(11) NULL, 
    UserIDLocked INT(11) NULL, 
    TimeInserted DATETIME NULL, 
    TimeUpdated DATETIME NULL, 
    TimeLocked DATETIME NULL,
    INDEX(EmployeeName),
    INDEX(EmployeeEmail1)
) ENGINE = MyISAM;

CREATE TABLE ab_employeesalary (
	EmployeeSalaryID INT(11) PRIMARY KEY AUTO_INCREMENT, 
    EmployeeSalaryDate DATE NULL, 
    EmployeeSalaryBasic INT(11) NULL, 
    EmployeeSalaryHousing INT(11) NULL,
    EmployeeSalaryMedical INT(11) NULL,
    EmployeeSalaryTransport INT(11) NULL,
    EmployeeSalaryFood INT(11) NULL,
    EmployeeSalaryInsurance INT(11) NULL,
    EmployeeSalaryCsr INT(11) NULL,
    EmployeeSalaryTax INT(11) NULL,
    EmployeeSalaryMotivation INT(11) NULL,
    EmployeeSalaryPenalty INT(11) NULL,
    EmployeeSalaryPf INT(11) NULL,
    EmployeeSalaryTotalAmount INT(11) NULL,
    EmployeeSalaryStatus VARCHAR(255) NULL,
    EmployeeID INT(11), 
    UserIDInserted INT(11) NULL, 
    UserIDUpdated INT(11) NULL, 
    UserIDLocked INT(11) NULL, 
    TimeInserted DATETIME NULL, 
    TimeUpdated DATETIME NULL, 
    TimeLocked DATETIME NULL,
    INDEX(EmployeeSalaryID),
    INDEX(EmployeeID)
) ENGINE = MyISAM;

CREATE TABLE ab_memo (
	MemoID INT(11) PRIMARY KEY AUTO_INCREMENT, 
    MemoDate DATE NULL, 
    MemoTitle VARCHAR(255) NULL,
    MemoCategory VARCHAR(255) NULL,
    MemoItem INT(11) NULL,
    MemoDescription VARCHAR(255) NULL,
    MemoQuantity VARCHAR(255) NULL,
    EmployeeID INT(11), 
    UserIDInserted INT(11) NULL, 
    UserIDUpdated INT(11) NULL, 
    UserIDLocked INT(11) NULL, 
    TimeInserted DATETIME NULL, 
    TimeUpdated DATETIME NULL, 
    TimeLocked DATETIME NULL,
    INDEX(MemoID),
    INDEX(EmployeeID)
) ENGINE = MyISAM;

CREATE TABLE ab_shop (
	ShopID INT(11) PRIMARY KEY AUTO_INCREMENT,  
    ShopTitle VARCHAR(255) NULL,
    ShopAddress VARCHAR(255) NULL,
    ShopArea VARCHAR(255) NULL,
    ShopDetail VARCHAR(255) NULL,
    ShopCategory VARCHAR(255) NULL,
    ShopMobileNo INT(20) NULL,
    EmployeeID INT(11), 
    UserIDInserted INT(11) NULL, 
    UserIDUpdated INT(11) NULL, 
    UserIDLocked INT(11) NULL, 
    TimeInserted DATETIME NULL, 
    TimeUpdated DATETIME NULL, 
    TimeLocked DATETIME NULL,
    INDEX(ShopID)
) ENGINE = MyISAM;

CREATE TABLE ab_expense (
	ExpenseID INT(11) PRIMARY KEY AUTO_INCREMENT, 
    ExpenseTitle VARCHAR(255) NULL, 
    ExpenseDate DATE NULL,
    ExpenseVoucherNo VARCHAR(255) NULL,
    ExpenseQuantity INT(11) NULL,
    ExpenseRate INT(11) NULL,
    ExpenseTotalAmount INT(11) NULL,
    ExpenseStatus VARCHAR(255) NULL,
    MemoID INT(11), 
    UserIDInserted INT(11) NULL, 
    UserIDUpdated INT(11) NULL, 
    UserIDLocked INT(11) NULL, 
    TimeInserted DATETIME NULL, 
    TimeUpdated DATETIME NULL, 
    TimeLocked DATETIME NULL,
    INDEX(ExpenseID),
    INDEX(MemoID)
) ENGINE = MyISAM;