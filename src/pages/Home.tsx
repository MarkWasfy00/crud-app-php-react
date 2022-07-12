import { useEffect } from 'react';
import axios from 'axios';

import Card from '../components/Card';
import ProductListNavbar from '../components/ProductListNavbar';


import { useDispatch } from 'react-redux';
import { useAppSelector } from '../redux/Hooks/Hooks';
import { importItems } from '../redux/ProductManger/ProductManager';



function Home() {
  const dispatch = useDispatch();
  const products = useAppSelector((state) => state.productmanager.products)


  useEffect(() => {
    const fetchData = async () => {
      const data = await axios("/server/src/Controllers/ProductList.php");
      const productsArray = await data.data;
      dispatch(importItems({products:productsArray}));
    }
    fetchData();
  },[])



  return (
    <main className="home">
      <ProductListNavbar />
      <div className="home__card-holder container">
        {
          products.map(product => {
            return <Card key={product.id} sku={product.sku} name={product.name} price={product.price} attribute={product.attribute} />
          })
        }
      </div>
    </main>
  )
}

export default Home
