import { Routes, Route } from "react-router-dom";
import AddProduct from "./pages/AddProduct";

import Home from './pages/Home';

const App = () => {
  return (
    <>
        <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/AddProduct" element={<AddProduct />} />
        </Routes>
    </>
  )
}

export default App