# 📘 SQL Mastery Cheat Sheet

🎯 _“Jo Data Ko Padh Le, Wo SQL Master Kehlaye”_

---

## 1. SQL Basics (Foundation Strong Honi Chahiye)

### 🔹 What is SQL?
Structured Query Language – used to manage relational databases.

### 🔹 Database vs Table
- **Database** = Digital Cupboard
- **Table** = Excel Sheet
- **Row** = One Record (e.g., one student)
- **Column** = Fields (e.g., name, age)

### 🔹 Data Types
`INT`, `VARCHAR`, `DATE`, `FLOAT`, etc.

### 🔹 DDL Commands
- `CREATE`, `ALTER`, `DROP`, `TRUNCATE`

### 🔹 DML Commands
- `INSERT`, `UPDATE`, `DELETE`

### 🔹 DQL Command
- `SELECT`

### 🔹 TCL Commands
- `COMMIT`, `ROLLBACK`, `SAVEPOINT`

### 🔹 Constraints
- `NOT NULL`, `UNIQUE`, `PRIMARY KEY`, `FOREIGN KEY`, `CHECK`, `DEFAULT`

---

## 2. SELECT Queries Mastery

1. `SELECT` with `WHERE`
2. `ORDER BY`, `LIMIT`
3. `BETWEEN`, `IN`, `LIKE`, `IS NULL`
4. `DISTINCT`
5. `ALIAS` (`AS` keyword)
6. Aggregate Functions: `COUNT()`, `SUM()`, `AVG()`, `MIN()`, `MAX()`
7. `GROUP BY` & `HAVING` (Diff between `WHERE` and `HAVING`)
8. `CASE WHEN THEN`

---

## 3. Joins (SQL ka Power Booster)

1. `INNER JOIN`
2. `LEFT JOIN`
3. `RIGHT JOIN`
4. `FULL JOIN`
5. `SELF JOIN`
6. `CROSS JOIN`
7. `JOIN` vs `SUBQUERY`

---

## 4. Subqueries & Set Operations

1. Single Row Subquery: `=`, `<`, `>`, etc.
2. Multiple Row Subquery: `IN`, `ANY`, `ALL`
3. Correlated Subqueries
4. `EXISTS` vs `IN`
5. `UNION`, `UNION ALL`
6. `INTERSECT`
7. `EXCEPT` / `MINUS`

---

## 5. Advanced SQL Functions

### 🔹 String Functions
- `CONCAT()`, `SUBSTRING()`, `REPLACE()`, `LENGTH()`, `TRIM()`

### 🔹 Date/Time Functions
- `NOW()`, `CURDATE()`, `DATEDIFF()`, `DATE_FORMAT()`

### 🔹 Numeric Functions
- `ROUND()`, `FLOOR()`, `CEIL()`, `ABS()`

### 🔹 Window Functions
- `ROW_NUMBER()`, `RANK()`, `DENSE_RANK()`
- `LEAD()`, `LAG()`, `NTILE()`
- `PARTITION BY`, `OVER()`

---

## 6. Views, Indexes & Transactions

1. **Views**
   - `CREATE VIEW`, `UPDATE VIEW`, `DROP VIEW`

2. **Indexes**
   - `CREATE INDEX`, `UNIQUE INDEX`
   - B-Tree, Hash Index for optimization

3. **Transactions**
   - ACID Properties
   - `BEGIN`, `COMMIT`, `ROLLBACK`

4. **Locking & Isolation**
   - `Read Uncommitted`, `Read Committed`, `Repeatable Read`, `Serializable`
   - Deadlocks, Phantom Reads

---

## 7. SQL Optimization Techniques

1. `EXPLAIN` / `ANALYZE`
2. Use Indexes in `WHERE` & `JOIN`
3. Avoid `SELECT *`
4. Prefer `JOIN` over Subquery when faster
5. Proper use of `EXISTS` vs `IN`
6. Table Partitioning

---

## 8. Stored Procedures & Triggers

1. **Stored Procedures**
   - `CREATE PROCEDURE`, `CALL`, IN/OUT Parameters

2. **Functions**
   - `CREATE FUNCTION`, returns value

3. **Triggers**
   - BEFORE / AFTER INSERT, UPDATE, DELETE

---

## 9. Real-World Database Concepts

1. **Normalization** (1NF → 5NF)
2. **Denormalization**
3. **ER Diagram** (Entity Relationship)
4. **Relational Algebra Basics**
5. **NoSQL vs SQL** (Conceptual)

---

## 10. Practice-Oriented Topics

1. Write Complex Queries on Multiple Tables
2. Nested Queries in `SELECT`, `FROM`, `WHERE`
3. Leetcode SQL Problems (Rank, Partitioning, etc.)
4. Design Projects: Attendance, E-commerce, Inventory

---

## 📦 Bonus Tools to Learn

| Tool                  | Use Case                            |
|-----------------------|-------------------------------------|
| MySQL Workbench       | GUI for MySQL                       |
| pgAdmin               | GUI for PostgreSQL                  |
| DBeaver               | Universal DB GUI                    |
| Leetcode / Hackerrank | SQL Practice                        |
| Kaggle Datasets       | Real-world data practice            |
| DB Browser SQLite     | GUI-based lightweight learning tool |
| SQLiteOnline          | Online learning (fast)              |

---

## 👨‍🏫 Teaching Tips

- **Analogies:** Table = Register, Row = Entry, Column = Field
- **Visuals:** Draw tables, use flowcharts
- **Code + Output Together:** Explain both query and result

---

## ✅ SQL Learning Flow (For Teachers/Students)

1. What is a Table?
2. How to Insert Data?
3. How to Fetch Data?
4. How to Update/Delete?
5. How to Search/Filter/Sort?
6. How Joins/Aggregates Work?
7. Mini Projects: Student Records, Library, Attendance

---

## ✅ Sample Beginner Practice

```sql
-- Create Table
CREATE TABLE students (
  id INT PRIMARY KEY,
  name VARCHAR(50),
  age INT,
  course VARCHAR(50)
);

-- Insert Data
INSERT INTO students VALUES (1, 'Riya', 20, 'BSc');
INSERT INTO students VALUES (2, 'Aman', 22, 'MCA');
INSERT INTO students VALUES (3, 'Priya', 19, 'BCom');

-- Select Data
SELECT * FROM students;
SELECT name, age FROM students;

-- Update Data
UPDATE students SET course = 'MSc' WHERE id = 2;

-- Delete Data
DELETE FROM students WHERE id = 3;

-- Filtered Select
SELECT name FROM students WHERE age > 21;
