package com.student.util;
import java.sql.Connection;
import java.sql.DriverManager;

public class DBUtil {
        public static Connection getConnection() {
            try {
                Class.forName("com.mysql.cj.jdbc.Driver");
                return DriverManager.getConnection("jdbc:mysql://localhost:9494/student_login", "root", "Rahul@123");
            } catch (ClassNotFoundException | java.sql.SQLException e) {
                System.err.println("Database connection error: " + e.getMessage());
                return null;
            }
        }
    }
