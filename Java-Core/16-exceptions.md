Bahut achha sawaal hai! Java me **exceptions** alag-alag prakaar ke hote hain, aur unka proper understanding bahut zaroori hai, especially jab tum JDBC, file handling, ya user input jaise areas me kaam karte ho.

---

## 🔷 Exception Kitne Prakar Ke Hote Hain?

### Java me Exceptions ko **do main categories** me divide kiya gaya hai:

```
                   Throwable
                   /       \
              Error      Exception
                         /       \
            Checked Exception   Unchecked Exception
```

---

## ✅ 1. **Checked Exceptions** (Compile Time Exceptions)

### 🔹 Kya hain?

* Aise exceptions jo **compile time** pe Java compiler ko dikhte hain.
* Java tumse **forcefully try-catch** ya `throws` ka use karne ko kehta hai.

### 🔹 Examples:

| Exception                | Kab aata hai?                                |
| ------------------------ | -------------------------------------------- |
| `SQLException`           | Jab DB se connect nahi ho paata              |
| `IOException`            | Jab file read/write me dikkat ho             |
| `ClassNotFoundException` | Jab class (jaise JDBC driver) nahi milti     |
| `FileNotFoundException`  | Jab file exist nahi karti                    |
| `InterruptedException`   | Jab thread ko forcefully interrupt kiya jaye |

### 🔸 Example:

```java
try {
    Class.forName("com.mysql.cj.jdbc.Driver");  // Checked Exception
} catch (ClassNotFoundException e) {
    System.out.println("Driver not found!");
}
```

---

## ✅ 2. **Unchecked Exceptions** (Runtime Exceptions)

### 🔹 Kya hain?

* Aise exceptions jo **runtime pe** aate hain, aur Java compiler force nahi karta handle karne ko.
* Ye mostly **logical errors** ya **programming mistakes** ke kaaran hote hain.

### 🔹 Examples:

| Exception                        | Kab aata hai?                     |
| -------------------------------- | --------------------------------- |
| `ArithmeticException`            | Divide by zero                    |
| `NullPointerException`           | Null object ko access karna       |
| `ArrayIndexOutOfBoundsException` | Array ke bahar index access karna |
| `NumberFormatException`          | Invalid number ko parse karna     |

### 🔸 Example:

```java
int a = 10 / 0;  // ArithmeticException
String s = null;
System.out.println(s.length());  // NullPointerException
```

---

## ✅ 3. **Error** (Serious Problems - Not Handled Usually)

### 🔹 Kya hain?

* Ye serious problems hoti hain jo program ke control me nahi hoti.
* Java generally inhe handle nahi karta.

### 🔹 Examples:

| Error                 | Kab aata hai?             |
| --------------------- | ------------------------- |
| `StackOverflowError`  | Infinite recursion        |
| `OutOfMemoryError`    | Jab memory khatam ho jaye |
| `VirtualMachineError` | JVM crash hone ke time    |

### 🔸 Example:

```java
public void recurse() {
    recurse();  // Infinite recursion → StackOverflowError
}
```

---

## 🔶 Table Summary:

| Type                | Compile Time/Runtime | Handle karna Zaroori?  | Examples                                  |
| ------------------- | -------------------- | ---------------------- | ----------------------------------------- |
| Checked Exception   | Compile Time         | Haan                   | SQLException, IOException                 |
| Unchecked Exception | Runtime              | Nahi (but recommended) | NullPointerException, ArithmeticException |
| Error               | Runtime              | Nahi (serious issue)   | OutOfMemoryError, StackOverflowError      |

---

## ✅ BONUS: Apna Custom Exception banana

```java
class MyException extends Exception {
    public MyException(String message) {
        super(message);
    }
}

...

throw new MyException("Custom error message");
```

---

## 🎯 Real-World Examples (JDBC context me):

| Scenario                    | Exception Type | Exception Name         |
| --------------------------- | -------------- | ---------------------- |
| Driver file missing         | Checked        | ClassNotFoundException |
| Database not connected      | Checked        | SQLException           |
| Query me syntax error       | Checked        | SQLException           |
| ResultSet se null data read | Unchecked      | NullPointerException   |
| Division by zero in logic   | Unchecked      | ArithmeticException    |

---

Agar tum kahoge, to main har ek exception ko chhoti chhoti coding example ke sath bhi samjha sakta hoon.

Batao, kaunsa type tumhe detail me aur chahiye?
