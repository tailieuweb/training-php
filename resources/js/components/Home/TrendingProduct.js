import { Row, Col, Button } from "reactstrap";
import "../../../css/TrendingProduct.css";
export default function TrendingProduct({ productList }) {
    const trendingList = productList.slice(0, 4).map((product) => {
        return (
            <Col key={product.id}>
                <div className="trending-product-info">
                    <div className="product-action--action">
                        <img
                            src={product.img}
                            alt={product.name}
                            className="img-fluid"
                        />
                        <div class="action-cart">
                            <Button color="danger" outline className="btn-block">
                                Add Cart
                            </Button>
                        </div>
                    </div>

                    <div className="info-detail">
                        <p className="info-detail-name">{product.name}</p>
                        <p className="info-detail-price">{product.price}</p>
                    </div>
                </div>
            </Col>
        );
    });

    return (
        <div className="trending-product container-fluid mt-5">
            <div className="trending-product-introduce">
                <h1>Trending Product</h1>
                <p>
                    Find a bright ideal to suit your taste with our great
                    selection of suspension, wall, floor and table lights.
                </p>
            </div>
            <Row xs="1" sm="2" md="4">
                {trendingList}
            </Row>
        </div>
    );
}