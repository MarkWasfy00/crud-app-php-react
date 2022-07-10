import axios from 'axios';
import { Link } from 'react-router-dom';
import { useAppSelector } from '../redux/Hooks/Hooks';


const ProductListNavbar = () => {
  const selectedProducts = useAppSelector((state) => state.productmanager.selectedProducts);

  
  const deleteBtn = async () => {
    if(selectedProducts.length >= 1){
      const sendData = await axios.post("/server/endpoints//ProductList.php",JSON.stringify({
        selectedProducts,
      }))
      const income = await sendData.data;
      if(income.status == 200){
        window.location.reload();
      }
    }
  }

  return (
    <nav className="nav">
        <div className="nav__holder container">
            <div className="nav__title headline-reg">Product List</div>
            <div className="nav__buttons">
                <Link to="/AddProduct">
                    <button className="btn-filled">ADD</button>
                </Link>
                <button className="btn-filled" id="delete-product-btn" onClick={deleteBtn}>MASS DELETE</button>
            </div>
        </div>
    </nav>
  )
}

export default ProductListNavbar