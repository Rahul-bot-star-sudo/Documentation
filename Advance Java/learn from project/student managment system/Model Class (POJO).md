* **Definition**
* **Use**
* **Code Example**
* **Real Life Analogy**
* **Interview Point**

---

## ✅ Step 3.1: **Model Class (POJO)** – `Student.java`

---

### 📘 **Definition**:

Model class ya **POJO (Plain Old Java Object)** ek simple Java class hoti hai jisme **variables + getter/setter** hote hain. Ye real-world entity ko represent karta hai, jaise Student, Book, Employee.

---

### 🎯 **Use**:

* Jab bhi hume data ko **store karna, pass karna ya manipulate karna** hota hai.
* MVC architecture me `Model` layer me use hota hai.
* Ye database table ka Java version hota hai.

---

### ✅ **Code Example** (Clean & Simple):

```java
public class Student {
    private int id;
    private String name;
    private String email;

    // Getter
    public String getName() {
        return name;
    }

    // Setter
    public void setName(String name) {
        this.name = name;
    }
}
```

---

### 🧠 **Real Life Analogy**:

> Socho ek "student form" jisme tumhara naam, email, ID likha hota hai — vo form ka paper version hai.
> Java me usi form ko ek **object** ke form me banate hain: `Student` class.

---

### 🎙️ **Interview Point**:

| ❓ Question                | ✅ Answer                                                            |
| ------------------------- | ------------------------------------------------------------------- |
| What is a POJO?           | A simple class with private fields and public getter/setters        |
| Is POJO same as JavaBean? | Almost. JavaBean also has no-arg constructor and is serializable    |
| Why use POJO?             | For data encapsulation and transfer between layers (like DAO ↔ JSP) |

---

### 🏁 Your Task:

Create this class:

📁 `com.student.model.Student.java`

```java
package com.student.model;

public class Student {
    private int id;
    private String name;
    private String email;
    private String course;

    // Getters and Setters
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public String getName() { return name; }
    public void setName(String name) { this.name = name; }

    public String getEmail() { return email; }
    public void setEmail(String email) { this.email = email; }

    public String getCourse() { return course; }
    public void setCourse(String course) { this.course = course; }
}
```

---
