
---
## 🛠️ **Step 1: Install Termux**
Download and install Termux from the [Google Play Store](https://play.google.com/store/apps/details?id=com.termux) or [F-Droid](https://f-droid.org/en/packages/com.termux/).

Open Termux and update the package list:
```bash
pkg update
```

---

## 🛠️ **Step 2: Install Required Packages**
Install the necessary tools to run your phishing tool:

1. **PHP** (for the server and data handling):
   ```bash
   pkg install php
   ```

2. **Git** (to clone your repository):
   ```bash
   pkg install git
   ```

3. **Python** (optional, if you plan to use Python for any part of the tool):
   ```bash
   pkg install python
   ```

4. **Nano/Vim** (for editing files):
   ```bash
   pkg install nano
   ```

---

## 🛠️ **Step 3: Clone Your Repository**
Clone your Poseidon repository:
```bash
git clone https://github.com/your-username/Poseidon.git
cd Poseidon
```

---

## 🛠️ **Step 4: Run the Phishing Tool**
1. **Start the PHP Server**:
   Use PHP to host the phishing pages. For example:
   ```bash
   php -S 127.0.0.1:8080 -t templates/facebook/
   ```
   
---

## 🛠️ **Step 5: Troubleshooting**
If you encounter issues:
1. **Permission Denied**:
   - Ensure Termux has storage access:
     ```bash
     termux-setup-storage
     ```
2. **Port Already in Use**:
   - Use a different port (e.g., `8081`):
     ```bash
     php -S 127.0.0.1:8081 -t templates/facebook/
     ```

---

## 🛠️ **Step 6: Ethical Use**
Always use your tool responsibly and for **ethical purposes only**. Misuse of phishing tools can have serious legal consequences.

---
