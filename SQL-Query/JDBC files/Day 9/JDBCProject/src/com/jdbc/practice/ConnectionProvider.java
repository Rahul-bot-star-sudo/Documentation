package com.jdbc.practice;

import java.sql.*;

public class ConnectionProvider {
    public static Connection getConnection() {
        Connection con = null;
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            con = DriverManager.getConnection(
                "jdbc:mysql://localhost:3306/world", "root", "Rahul@123"
            );
        } catch (Exception e) {
            e.printStackTrace();
        }
        return con;
    }
}
