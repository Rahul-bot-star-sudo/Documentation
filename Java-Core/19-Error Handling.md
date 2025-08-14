# 🛠 Java & Servlet Error Handling Notes

## 1️⃣ Types of Errors
- **Compilation Error** 💻 → Code is wrong, cannot compile  
  Example: `cannot find symbol`  
- **Runtime Error** ⚠️ → Code compiles, but crashes when running  
  Example: `NullPointerException`  
- **Logical Error** 🤔 → Code runs, but gives wrong output  
  Example: Wrong formula used

---

## 2️⃣ How to Read an Error Message
- **Type** 🏷 → What kind of problem (NullPointerException, ArithmeticException, etc.)
- **Description** 📄 → What exactly happened  
  Example: `/ by zero` means division by zero  
- **Location** 📍 → Which file & line number caused it  
  Example: `(BuggyServlet.java:18)`

---

## 3️⃣ Common Servlet Errors
| Error Type | Example | Reason | Fix |
|------------|---------|--------|-----|
| ❌ Compilation | `cannot find symbol` | Method/variable missing | Create method or correct name |
| ⚠️ Runtime | `NullPointerException` | Using variable without value | Add null check |
| 📄 HTTP Error 404 | Page not found | Wrong URL mapping | Check `web.xml` or `@WebServlet` |
| 📄 HTTP Error 500 | Server crashed | Exception in code | Read server logs & fix code |

---

## 4️⃣ Debugging Steps 🕵️‍♂️
1. **Read the error message fully** 🧐  
2. **Find the type** (Compilation / Runtime / Logical)  
3. **Go to the mentioned line number** 📍  
4. **Think: Why did this happen?** 🤔  
5. **Fix it** 🛠  
6. **Run again & check** 🔄  

---

## 5️⃣ Tips to Learn from Errors 💡
- Always **read server logs** in Tomcat → `logs/catalina.out` 📂  
- Search exact error on Google 🔍  
- Keep a **personal error diary** 📓 → Write error + fix  
- Never ignore red underlines in IDE ❗  

---

## 6️⃣ Example: NullPointerException in Servlet
```java
String name = request.getParameter("username");
out.println(name.toUpperCase()); // ❌ If name is null, crash!
````

**Fix ✅:**

```java
if (name == null) {
    name = "Guest";
}
out.println(name.toUpperCase());
```

---

💬 **Remember:**
```
> Error is not your enemy 😄.
> It’s just your code telling you exactly what it doesn’t understand.

```
