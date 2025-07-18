/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
// Package name is com.jdbc.practice (used to organize classes)
package com.jdbc.practice;
// Import BufferedReader for reading input from user
// Import InputStreamReader to read input from console
// Import Connection for connecting to the database
// Import PreparedStatement to run parameterized SQL queries
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.sql.Connection;
import java.sql.PreparedStatement;

/**
 *
 * @author rahul
 */
public class UpdateJDBC {
    public static void main(String[] args){
        try{
           Connection con = ConnectionProvider.getConnection(); 
           // SQL query to update name and city in table1 for a specific ID
           String q = "update table1 set tName=? , tCity=? where tId=?";
           // Create a BufferedReader to take input from the keyboard
           BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
           System.out.println("Enter now name :");
           String name = br.readLine();
           
           System.out.println("Enter your city name :");
           String city = br.readLine();
           
           System.out.println("Enter the student id: ");
           int id = Integer.parseInt(br.readLine());
           
           // Create a PreparedStatement using the SQL query 'q'
           PreparedStatement pstmt = con.prepareStatement(q);
            // Set the first placeholder (?) to the value of 'name'
            pstmt.setString (1 , name);
            // Set the second placeholder (?) to the value of 'city'
            pstmt.setString(2 , city);
            // Set the third placeholder (?) to the value of 'id'
            pstmt.setInt(3 , id);

           // Run the SQL update query and store how many rows were changed
           int rowsAffected = pstmt.executeUpdate();
            // Print a message showing how many rows were updated
           System.out.println("done... " + rowsAffected + " row(s) updated.");
           
           
           pstmt.close();
           con.close();
           
        }catch(Exception e){
            e.printStackTrace();
        }
        
    }
}
