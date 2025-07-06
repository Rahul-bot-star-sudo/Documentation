
## ✅ Part 1: Importing the Arrays Class

To use array methods, you need to import:

```java
import java.util.Arrays;
```

---

## ✅ Part 2: `Arrays.sort()` — Sorting an Array

### 🔹 What it does:

Sorts the array in **ascending order** (small to big).

### 🧪 Example:

```java
import java.util.Arrays;

public class Main {
    public static void main(String[] args) {
        int[] nums = {4, 2, 9, 1, 5};

        Arrays.sort(nums);  // Sort the array

        for (int num : nums) {
            System.out.print(num + " ");
        }
        // Output: 1 2 4 5 9
    }
}
```

### 🔸 Works for:

* `int[]`, `double[]`, `String[]`, etc.

---

## ✅ Part 3: `Arrays.copyOf()` — Copying an Array

### 🔹 What it does:

Copies the first `n` elements into a new array.

### 🧪 Example:

```java
import java.util.Arrays;

public class Main {
    public static void main(String[] args) {
        int[] original = {10, 20, 30, 40};

        int[] copy = Arrays.copyOf(original, 2);

        for (int num : copy) {
            System.out.print(num + " ");
        }
        // Output: 10 20
    }
}
```

> If `n` is **greater** than the original length, it fills with **default values** (`0` for `int`, `null` for `String`).

---

## ✅ Bonus: `Arrays.toString()` — Print Arrays Easily

Instead of writing a loop:

```java
System.out.println(Arrays.toString(nums));
```

---

## 🧠 Real-Life Analogy

* `Arrays.sort()` = Like sorting your books by name or size 📚
* `Arrays.copyOf()` = Like taking only the **first few pages** of a book 📄

---

## 📝 Practice Questions

### Q1: What will this print?

```java
int[] data = {9, 2, 7, 4};
Arrays.sort(data);
System.out.println(Arrays.toString(data));
```

### Q2: Copy the first 3 elements of this array:

```java
String[] names = {"Amit", "Nina", "Raj", "Simran"};
```

### Q3: What happens if you write:

```java
Arrays.copyOf(data, 10);
```

---

## ✅ Summary

| Method                  | Purpose                   |
| ----------------------- | ------------------------- |
| `Arrays.sort(array)`    | Sorts in ascending order  |
| `Arrays.copyOf(arr, n)` | Copies first `n` elements |
| `Arrays.toString()`     | Prints array as string    |

---