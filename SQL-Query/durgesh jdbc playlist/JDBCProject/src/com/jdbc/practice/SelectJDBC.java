package com.jdbc.practice;

import java.sql.Connection;
import java.sql.Statement;
import java.sql.ResultSet;

public class SelectJDBC {
    public static void main(String[] args) {
        try {
            // Step 1: Get connection from ConnectionProvider
            Connection con = ConnectionProvider.getConnection();

            // Step 2: Write SQL query to fetch all data from table1
            String query = "SELECT * FROM table1";

            // Step 3: Create a Statement object to send SQL to the database
            Statement stmt = con.createStatement();

            // Step 4: Execute the query and get the result in a ResultSet
            ResultSet set = stmt.executeQuery(query);

            // Step 5: Loop through the ResultSet to read each row
            while (set.next()) {
                int id = set.getInt(1);             // First column: id (int)
                String name = set.getString(2);     // Second column: name (String)
                String city = set.getString(3);     // Third column: city (String)

                // Step 6: Print the data
                System.out.println("ID: " + id);
                System.out.println("Name: " + name);
                System.out.println("City: " + city);
                System.out.println("----------------------");
            }

            // Optional: Close connection (good practice)
            con.close();

        } catch (Exception e) {
            e.printStackTrace(); // Print exception if any error occurs
        }
    }
}
