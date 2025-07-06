
## ✅ **Vectors in Java (DSA)**

---

### 🔹 What is a Vector?

A **Vector** in Java is like a **resizable array**.
Unlike regular arrays (fixed size), a `Vector` can **grow or shrink** as needed.

---

### 📦 Example:

```java
import java.util.Vector;

public class Main {
    public static void main(String[] args) {
        Vector<Integer> nums = new Vector<>();

        nums.add(10);
        nums.add(20);
        nums.add(30);

        System.out.println(nums); // [10, 20, 30]
    }
}
```

---

### 🔹 Why Use Vector?

| Feature             | Array   | Vector                           |
| ------------------- | ------- | -------------------------------- |
| Fixed size?         | ✅ Yes   | ❌ No                             |
| Auto-resizing?      | ❌ No    | ✅ Yes                            |
| Built-in functions? | ❌ Basic | ✅ Many (add, remove, size, etc.) |
| Thread-safe?        | ❌ No    | ✅ Yes                            |

---

### 🔹 Common Vector Methods

| Method                | Description              |
| --------------------- | ------------------------ |
| `add(element)`        | Adds an element at end   |
| `add(index, element)` | Adds at a specific index |
| `get(index)`          | Returns element at index |
| `set(index, element)` | Updates element at index |
| `remove(index)`       | Removes element at index |
| `size()`              | Returns current size     |
| `contains(element)`   | Checks if value exists   |
| `clear()`             | Removes all elements     |

---

### 🔁 Looping through a Vector

```java
for (int i = 0; i < nums.size(); i++) {
    System.out.println(nums.get(i));
}
```

Or using enhanced `for` loop:

```java
for (int x : nums) {
    System.out.println(x);
}
```

---

### 🧠 Analogy:

Think of a `Vector` like a **magic bag** that resizes itself as you keep adding things — no need to worry about how much space you need.

---

### 📝 Practice Time:

#### Q: What’s the output?

```java
Vector<String> list = new Vector<>();
list.add("A");
list.add("B");
list.remove(0);
System.out.println(list.get(0));
```

A) A
B) B
C) Error
D) null

👉 Your answer?