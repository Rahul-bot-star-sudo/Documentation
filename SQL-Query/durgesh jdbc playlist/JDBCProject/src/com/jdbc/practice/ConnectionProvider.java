// This creates a package to store our program
package com.jdbc.practice;
// This line imports all SQL classes in Java
import java.sql.*;

// This is a Java class named ConnectionProvider
public class ConnectionProvider {

// This method gives a connection to the database
    public static Connection getConnection() {
     
        // Create a connection variable and set it to null (empty for now)
        Connection con = null;
       
        // Here, a connection to the database is created using try-catch
        try {
            // Load the MySQL JDBC driver class
            Class.forName("com.mysql.cj.jdbc.Driver");
            // Connect to the MySQL database named "world" using username "root" and password "Rahul@123"
            con = DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/world", "root", "Rahul@123"
            );
        } catch (Exception e) {
            // Print the error details if something goes wrong
            e.printStackTrace();
        }
        
        return con;
    }
}
