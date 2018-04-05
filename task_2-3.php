//Задание 2
//Дамп приложен в файле db_test.sql
INSERT INTO `db_test`.`departments` (`id`, `name`) VALUES 
(1, 'Отдел сопровождения'), 
(2, 'Отдел тестирования'),
(3, 'Отдел аналитики');

INSERT INTO `db_test`.`workers` (`id`, `firstname`, `lastname`, `middlename`, `department_id`) VALUES ('1', 'Иван', 'Иванов', 'Иванович', '1'), 
('2', 'Петр', 'Петров', 'Сергеевич', '1'),
('3', 'Сергей', 'Сергеев', 'Петрович', '3'),
('4', 'Иван', 'Маслов', 'Семенович', '2'),
('5', 'Семен', 'Бортов', 'Петрович', '3'),
('6', 'Ирина', 'Григорьева', 'Сергеевна', '2'),
('7', 'Светлана', 'Жиглова', 'Адександровна', '2'),
('8', 'Екатерина', 'Семенова', 'Ивановна', '3'),
('9', 'Александр', 'Петров', 'Григорьевич', '2'),
('10', 'Ольга', 'Петровских', 'Валерьевна', '3'),
('11', 'Петр', 'Жиглов', 'Романович', '2'),
('12', 'Мария', 'Петрова', 'Ивановна', '3');

//Запрос №1
SELECT departments.name from departments
JOIN workers ON workers.department_id = departments.id
GROUP by departments.name
HAVING COUNT(departments.name) >= 5;

//Запрос №2
SELECT departments_name, GROUP_CONCAT(workers_id SEPARATOR ', ') as 'workers_id'
FROM ( 
    SELECT departments.name as departments_name, workers.id as workers_id FROM departments, workers 
    where departments.id = workers.department_id
    ) as workers_id
GROUP BY departments_name;

//Задание 3
//Дамп 'new' прилагается new.sql

SELECT users.id, name, surname, phones.number FROM `users`, `user_phone`, `phones`
WHERE user_phone.user_id=users.id 
AND user_phone.phone_number=phones.number;

