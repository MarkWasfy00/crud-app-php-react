import { Link } from 'react-router-dom'

const Navbar = () => {
  return (
    <nav className="nav">
        <div className="nav__holder container">
            <div className="nav__title headline-reg">Product List</div>
            <div className="nav__buttons">
                <Link to="/AddProduct">
                    <button className="btn-filled">ADD</button>
                </Link>
                <button className="btn-filled" id="delete-product-btn">MASS DELETE</button>
            </div>
        </div>
    </nav>
  )
}

export default Navbar