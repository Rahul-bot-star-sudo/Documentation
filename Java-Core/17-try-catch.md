## 🔷 `try-catch` Kya Hota Hai?

Java me `try-catch` ek **exception handling mechanism** hai. Jab koi error ya **unexpected situation** program me hoti hai (jaise file missing, database connection fail, divide by zero, etc.), to **program crash na ho**, isiliye hum `try-catch` use karte hain.

---

### 🔴 Without try-catch:

```java
int a = 10 / 0;  // This will crash the program (ArithmeticException)
System.out.println("This won't run.");
```

### ✅ With try-catch:

```java
try {
    int a = 10 / 0;  // Risky code
} catch (ArithmeticException e) {
    System.out.println("Can't divide by zero!");
}
System.out.println("Now this will run.");
```

---

## 🔍 `try-catch` Syntax Breakdown:

```java
try {
    // yahan likho jo code crash kar sakta hai
} catch (ExceptionType e) {
    // agar error aaye to yahan handle karo
}
```

### ✅ Real-Life Example:

💡 **Example: Database Driver Load karna**

```java
try {
    Class.forName("com.mysql.cj.jdbc.Driver");  // Driver load kar rahe ho
} catch (ClassNotFoundException e) {
    System.out.println("Driver not found! Check the .jar file.");
    e.printStackTrace();  // Error ka detail print karega
}
```

#### ❗ Kya ho sakta hai yahan?

Agar driver jar file sahi se add nahi hui, to program crash ho sakta hai. But try-catch se hum ise gracefully handle kar lete hain.

---

## 🔷 Real World Analogy:

**Socho tum pressure cooker chala rahe ho:**

* **try block:** Tum cooker me daal paani daal kar gas on karte ho (risky kaam).
* **catch block:** Agar cooker phat gaya (error aaya), to tum gloves, safety tools se use handle karte ho — ghar bach gaya!

---

## ✅ Multiple catch blocks:

```java
try {
    // risky code
} catch (ArithmeticException e) {
    System.out.println("Math problem");
} catch (NullPointerException e) {
    System.out.println("Object is null");
} catch (Exception e) {
    System.out.println("Something went wrong");
}
```

---

## ✅ finally block:

```java
try {
    // code
} catch (Exception e) {
    // handle error
} finally {
    System.out.println("This will always run"); // even if error occurs
}
```

👉 `finally` ka use **resource close karne** ke liye hota hai jaise `con.close();` in JDBC.

---

## ✅ Summary:

| Part      | Kaam                                 |
| --------- | ------------------------------------ |
| `try`     | Risky code jahan error aasakta hai   |
| `catch`   | Agar error aaye to yahan handle karo |
| `finally` | Hamesha chalega, cleanup ke liye     |

---

### Chhota JDBC Example with Try-Catch:

```java
try {
    Class.forName("com.mysql.cj.jdbc.Driver");
    Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/world", "root", "Rahul@123");
    System.out.println("Connected Successfully!");
    con.close();
} catch (ClassNotFoundException e) {
    System.out.println("Driver not found!");
} catch (SQLException e) {
    System.out.println("Database connection issue.");
}
```

---

Agar tum chaho to main tumhare JDBC project me `try-catch-finally` ka best practice implementation bhi dikha sakta hoon.

