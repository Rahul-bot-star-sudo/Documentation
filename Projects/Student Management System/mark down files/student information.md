शानदार ✅
अब हम बनाएँगे `Student.java` – यह एक **POJO (Plain Old Java Object)** class है जो एक Student की information को store करता है।

---

## 🎯 इसका काम क्या है?

Student class:

* एक student का **name, email, course** और **id** रखेगा।
* हम इससे object बना सकते हैं और database में भेज सकते हैं।

---

## 📄 File: `Student.java`

📁 **Path:**
`StudentManagementSystem/src/com/jdbc/project/Student.java`

---

### ✅ Code with Hindi Explanation (हर लाइन समझाई गई है):

```java
package com.jdbc.project;
// 👆 यह बताता है कि यह class किस package में है

public class Student {
    // 👇 Fields (variables) जो एक student की जानकारी रखेंगी
    private int id;
    private String name;
    private String email;
    private String course;

    // ✅ Constructor without id (जब नया student जोड़ना हो)
    public Student(String name, String email, String course) {
        this.name = name;
        this.email = email;
        this.course = course;
    }

    // ✅ Constructor with id (जब database से data लाना हो)
    public Student(int id, String name, String email, String course) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.course = course;
    }

    // ✅ Getters (Encapsulation principle का part हैं)
    public int getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public String getEmail() {
        return email;
    }

    public String getCourse() {
        return course;
    }

    // ✅ Setters (अगर जरूरत हो तो इस्तेमाल कर सकते हैं)
    public void setId(int id) {
        this.id = id;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setCourse(String course) {
        this.course = course;
    }
}
```

---

## 🧠 Concepts Used:

| Concept                     | Why it matters                                                     |
| --------------------------- | ------------------------------------------------------------------ |
| **POJO class**              | एक simple class जो सिर्फ data रखती है                              |
| **Encapsulation**           | private fields + public getters/setters                            |
| **Constructor Overloading** | एक constructor new insert के लिए, दूसरा DB से आने वाले data के लिए |

---

## ✅ अब आपको क्या करना है:

1. NetBeans में `Student.java` class बनाओ उसी package में (`com.jdbc.project`)
2. ऊपर का code paste करो
3. ✅ अगर कोई error नहीं आता — तो बताओ `Next`,
