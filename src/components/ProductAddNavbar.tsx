import { Link } from "react-router-dom"


const ProductAddNavbar = () => {
  return (
    <nav className="nav">
        <div className="nav__holder container">
        <div className="nav__title headline-reg">Product Add</div>
        <div className="nav__buttons">
            <button className="btn-filled" type="submit" form="product_form">Save</button>
            <Link to="/">
                <button className="btn-filled" id="delete-product-btn" >Cancel</button>
            </Link>
        </div>
        </div>
    </nav>
  )
}

export default ProductAddNavbar