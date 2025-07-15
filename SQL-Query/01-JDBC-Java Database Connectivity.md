# JDBC - Java Database Connectivity
**JDBC** stands for **Java Database Connectivity**. It is a standard API provided by Oracle for Java applications to interact with defferent set of databases.
### 1. Compile-Time Polymorphism (Method Overloading)
Same method name but **different parameters**.
```java
class MathUtils {
    // int add
    int add(int a, int b) {
        return a + b;
    }

    // double add
    double add(double a, double b) {
        return a + b;
    }
}

```
### 2. Run-Time Polymorphism (Method Overriding)
**Base class ka method child class me override karna.**
```java
class Animal {
    void sound() {
        System.out.println("Animal makes sound");
    }
}

class Dog extends Animal {
    void sound() {
        System.out.println("Dog barks");
    }
}

class Test {
    public static void main(String[] args) {
        Animal a = new Dog();  // 👈 Run-time polymorphism
        a.sound();             // Output: Dog barks
    }
}

```
### Why JDBC
**Primitive data type**
**Non-Primitive data type**
JDBC is used to save data permanently in a database, not temporarily.

### How JDBC Work(Architecture of JDBC)
#### **JDBC Architecture**
                                  
**Java Application -> JDBC API -> SQL Driver (JDBC Database Drivers) -> sql (Databases)**
### JDBC

* **Important Classes and interfaces:**
* 
* java.sql.DriverManager
* java.sql.Connection
* java.sql.Statment
* java.sql.PreparedStatement
* java.sql.CallableStatement
* java.sql.ResultSet
* java.sql.ResultSetMetaData
* java.sql.DatabaseMetada
* java.sql.SQLException


### Where to write code

* Any TextEditor such as Notepad, sublime , vscode etc
* Any Java IDE netbeansE, clipse, Intellij




