import { useEffect, useState } from "react";

function App() {
  const [message, setMessage] = useState("Loading...");

  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/health")
      .then((response) => response.json())
      .then((data) => {
        setMessage(data.message);
      })
      .catch((error) => {
        console.error(error);
        setMessage("Failed to connect to Laravel API");
      });
  }, []);

  return (
    <div style={{ padding: "40px", fontFamily: "Arial" }}>
      <h1>Smart OSC ERP</h1>

      <h2>Backend status:</h2>

      <p>{message}</p>
    </div>
  );
}

export default App;