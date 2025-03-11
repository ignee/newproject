import React, { useEffect, useState } from "react";
import './App.css';
function App() {
  const [message, setMessage] = useState("");

  useEffect(() => {
    fetch("/api/hello")
      .then((response) => response.json())
      .then((data) => setMessage(data.message));
  }, []);

  return (
    <div className="App">
      <header className="App-header">
        <h1>Welcome to React Frontend</h1>
        <p className="App-description">
          <strong>Message from Backend:</strong> {message || "Loading..."}
        </p>
      </header>
      <footer className="App-footer">
        <p>&copy; {new Date().getFullYear()} Your Project</p>
      </footer>
    </div>
  );
}

export default App;