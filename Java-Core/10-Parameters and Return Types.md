
## ✅ Part 1: What Are Parameters?

### 🔹 Definition:

**Parameters** are values you **pass into a method** so it can work on different data.

📦 Like adding ingredients to a recipe. The method (recipe) uses your ingredients (parameters).

---

### 🔸 Example:

```java
void greet(String name) {
  System.out.println("Hello " + name);
}
```

Here, `String name` is the **parameter**.

### 🔸 Call it like:

```java
greet("Alice");  // Output: Hello Alice
greet("Bob");    // Output: Hello Bob
```

---

## ✅ Part 2: Return Type

### 🔹 Definition:

A **return type** is the **type of value a method gives back** after it finishes.

### 🔸 Syntax:

```java
int add(int a, int b) {
  return a + b;
}
```

Here:

* `int` is the **return type**
* `a` and `b` are the **parameters**
* `return a + b;` sends back the result

### 🔸 Call it like:

```java
int result = add(4, 6);  // result = 10
```

---

## ✅ Part 3: Full Method Structure

```java
returnType methodName(parameter1, parameter2, ...) {
  // method body
  return result;
}
```

### Example:

```java
double getArea(double radius) {
  return 3.14 * radius * radius;
}
```

---

## 🧠 Real-Life Analogy

📞 Think of a **phone call**:

* You **pass a number** (parameter)
* The phone connects and **returns a response** (return value)

Or:

* A **calculator**: You input numbers → it calculates → gives a result.

---

## 📝 Practice Questions

### Q1: Write a method `int multiply(int a, int b)` that returns the product.

### Q2: Write a method `String fullName(String first, String last)` that returns the full name.

### Q3: What’s wrong with this method?

```java
int sayHi(String name) {
  System.out.println("Hi " + name);
}
```

(Hint: It has a return type but no `return` statement.)

---

## 🔄 Summary Table

| Part           | Example                               |
| -------------- | ------------------------------------- |
| Parameter      | `int a, int b` in `add(int a, int b)` |
| Return Type    | `int`, `String`, `boolean`, etc.      |
| Return keyword | `return value;`                       |
| Void method    | `void greet()` - returns nothing      |

---

