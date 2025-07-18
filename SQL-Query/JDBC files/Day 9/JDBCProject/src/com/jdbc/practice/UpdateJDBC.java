/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.jdbc.practice;
import java.sql.Connection;
import java.io.BufferedReader;
import java.io.InputStreamReader;
 
import java.sql.PreparedStatement;

/**
 *
 * @author rahul
 */
public class UpdateJDBC {
    public static void main(String[] args){
        try{
           Connection con = ConnectionProvider.getConnection(); 
           String q = "update table1 set tName=? , tCity=? where tId=?";
           BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
           System.out.println("Enter now name :");
           String name = br.readLine();
           
           System.out.println("Enter your city name :");
           String city = br.readLine();
           
           System.out.println("Enter the student id: ");
           int id = Integer.parseInt(br.readLine());
           
           
           PreparedStatement pstmt = con.prepareStatement(q);
           pstmt.setString (1 , name);
           pstmt.setString(2 , city);
           pstmt.setInt(3 , id);
           
            int rowsAffected = pstmt.executeUpdate();
           System.out.println("done... " + rowsAffected + " row(s) updated.");
           
           
           pstmt.close();
           con.close();
           
        }catch(Exception e){
            e.printStackTrace();
        }
        
    }
}
