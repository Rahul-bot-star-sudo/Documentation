### 🔧 Command 1: `git reset --soft HEAD~1`

#### 🔍 Kya karta hai?

Ye command **last commit ko hata deta hai**, lekin:

* **Changes ko staging area me** rakhta hai
* Matlab: Tumne commit kiya tha, wo hata diya gaya
* Lekin file ka code abhi bhi staged hai (yaani `git status` me dikhega)

#### 📦 Kab use karte hain?

Agar tumne galat commit kar diya, **lekin code sahi hai**, aur tum fir se commit karna chahte ho (shaayad message theek nahi diya ya aur kuch add karna tha).

#### 📘 Example:

```bash
git reset --soft HEAD~1
```

* Ye last commit hata dega
* Par changes staged rahenge
* Tum dobara commit kar sakte ho:

```bash
git commit -m "Corrected commit message"
```

---

### 🚀 Command 2: `git push -f`

#### 🔍 Kya karta hai?

Ye command **forcefully** tumhara local commit GitHub par **overwrite (replace)** kar deta hai — even agar GitHub pe kuch aur commits ho.

#### ⚠️ WARNING:

`-f` (force) ka matlab: Agar remote (GitHub) par kuch commits hain, to unhe hata sakta hai agar wo tumhare local se match nahi karte.

#### 📦 Kab use karte hain?

Jab:

* Tumne `git reset` ya `rebase` use kiya ho
* Tumhe apna branch forcefully push karna ho
* Jaise: `git reset --soft HEAD~1` ke baad tumhe firse push karna hai

#### 📘 Example:

```bash
git push -f
```

---

### 💡 Ek Example Flow:

```bash
git reset --soft HEAD~1   # Last commit hatao (code safe hai)
git commit -m "Naya commit message"   # Fir se commit karo
git push -f   # Forcefully GitHub pe overwrite karo
```

---

Agar aur commits delete karne hain to `HEAD~2`, `HEAD~3` likh sakte ho.
