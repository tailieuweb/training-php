import React from 'react';
import TopContent from './TopContent';
import RelatedContent from './RelatedContent';
import Review from './Review/Review';
export default function Detail() {
    return (
        <div className="detail">
            <TopContent/>
            <Review/>
            <RelatedContent/>
        </div>
    )
}
