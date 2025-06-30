# JDBC SQL Practice 🚀

This repository contains basic JDBC (Java Database Connectivity) programs to help learn how to connect Java applications with MySQL databases.

## 📁 Folder Structure

- `InsertData.java` – Insert data into database.
- `FetchData.java` – Retrieve data from database.
- `UpdateData.java` – Update existing records.
- `DeleteData.java` – Delete records from the database.
- `CreateTable.java` – Create a new table in the database.
- `practicequery.java` – Practice queries with different operations.

## 🛠️ Requirements

- Java (JDK 8 or above)
- MySQL installed
- MySQL Connector/J (`.jar` file like `mysql-connector-j-8.x.x.jar`)
- A MySQL database (e.g., `school`, `students`, etc.)

## ⚙️ How to Run

1. Clone the repo or download the zip.
2. Add the MySQL connector JAR file to your classpath.
3. Make sure the database and required tables are created.
4. Compile and run like this (for example):

```bash
javac -cp .;mysql-connector-j-9.3.0.jar FetchData.java
java -cp .;mysql-connector-j-9.3.0.jar FetchData
