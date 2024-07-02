CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    department VARCHAR(50),
    position VARCHAR(50)
);
CREATE TABLE salary_structures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    basic_pay DECIMAL(10, 2) NOT NULL,
    allowances DECIMAL(10, 2),
    deductions DECIMAL(10, 2)
);
CREATE TABLE pay_scales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    grade VARCHAR(50) NOT NULL,
    min_salary DECIMAL(10, 2) NOT NULL,
    max_salary DECIMAL(10, 2) NOT NULL
);
CREATE TABLE employee_salaries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    salary_structure_id INT,
    pay_scale_id INT,
    gross_pay DECIMAL(10, 2),
    net_pay DECIMAL(10, 2),
    payment_date DATE,
    FOREIGN KEY (employee_id) REFERENCES employees(id),
    FOREIGN KEY (salary_structure_id) REFERENCES salary_structures(id),
    FOREIGN KEY (pay_scale_id) REFERENCES pay_scales(id)
);

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    attendance_date DATE,
    status ENUM('present', 'absent') NOT NULL,
    remarks TEXT,
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);
CREATE TABLE leave_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    leave_type VARCHAR(50) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
    remarks TEXT,
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);
CREATE TABLE payroll_processing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    salary_structure_id INT,
    pay_scale_id INT,
    month_year VARCHAR(7) NOT NULL,
    gross_pay DECIMAL(10, 2),
    net_pay DECIMAL(10, 2),
    tax_deduction DECIMAL(10, 2),
    insurance_deduction DECIMAL(10, 2),
    other_deductions DECIMAL(10, 2),
    payment_date DATE,
    FOREIGN KEY (employee_id) REFERENCES employees(id),
    FOREIGN KEY (salary_structure_id) REFERENCES salary_structures(id),
    FOREIGN KEY (pay_scale_id) REFERENCES pay_scales(id)
);
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'hr', 'employee') NOT NULL
);

