function ays_closestEdge(x,y,w,h) {
    let ays_topEdgeDist = ays_distMetric(x,y,w/2,0);
    let ays_bottomEdgeDist = ays_distMetric(x,y,w/2,h);
    let ays_leftEdgeDist = ays_distMetric(x,y,0,h/2);
    let ays_rightEdgeDist = ays_distMetric(x,y,w,h/2);
    let ays_min = Math.min(ays_topEdgeDist,ays_bottomEdgeDist,ays_leftEdgeDist,ays_rightEdgeDist);

    switch (ays_min) {
        case ays_leftEdgeDist:
            return 'left';
        case ays_rightEdgeDist:
            return 'right';
        case ays_topEdgeDist:
            return 'top';
        case ays_bottomEdgeDist:
            return 'bottom';
    }
}

//Distance Formula
function ays_distMetric(x,y,x2,y2) {
    let ays_xDiff = x - x2;
    let ays_yDiff = y - y2;
    return (Math.abs(ays_xDiff) * Math.abs(ays_yDiff))/2;
}

function ays_getDirectionKey(ev, obj) {
    let ays_w = obj.offsetWidth,
        ays_h = obj.offsetHeight,
        ays_x = (ev.pageX - obj.offsetLeft - (ays_w / 2) * (ays_w > ays_h ? (ays_h / ays_w) : 1)),
        ays_y = (ev.pageY - obj.offsetTop - (ays_h / 2) * (ays_h > ays_w ? (ays_w / ays_h) : 1)),
        ays_d = Math.round( Math.atan2(ays_y, ays_x) / 1.57079633 + 5 ) % 4;
    return ays_d;
}