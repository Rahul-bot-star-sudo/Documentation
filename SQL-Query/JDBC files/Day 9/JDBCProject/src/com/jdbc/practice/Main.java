package com.jdbc.practice;

import java.io.*;       // Import all classes for input/output (like File, InputStream, etc.)
import java.sql.*;     // Import all SQL classes for database work
import javax.swing.*;  // Import all Swing classes for GUI elements like file chooser and message boxes


public class Main{
    public static void main(String[] args) {
        try {
            // Get the database connection from the ConnectionProvider class and store it in 'c'
            Connection c = ConnectionProvider.getConnection(); 

            // SQL query to insert an image into the 'images' table
            String q = "INSERT INTO images (pic) VALUES (?)";

            // Create a PreparedStatement using the query 'q' and the connection 'c'
            PreparedStatement pstmt = c.prepareStatement(q);

            // Create a file chooser dialog to select a file from the computer
            JFileChooser jfc = new JFileChooser();

            // Show the file chooser dialog to the user
            jfc.showOpenDialog(null);

            // Get the file selected by the user from the file chooser
            File file = jfc.getSelectedFile();

           
            // Create a FileInputStream to read the selected file
            FileInputStream fis = new FileInputStream(file);

            // Set the file data in the SQL query as a binary stream at position 1
            pstmt.setBinaryStream(1, fis, fis.available());

            // Execute the SQL query to insert the image into the database
            pstmt.executeUpdate();

            // Show a message box saying "Success!" to the user
            JOptionPane.showMessageDialog(null, "Success!");

            // Close the FileInputStream
            // Close the PreparedStatement
            // Close the database connection
            fis.close();
            pstmt.close();
            c.close();

        } catch (Exception e) {
            e.printStackTrace();

            // Show an error message popup if something goes wrong
            JOptionPane.showMessageDialog(null, "Error: " + e.getMessage());
        }
    }
}
