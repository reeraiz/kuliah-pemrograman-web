    .gallery {
    margin: 0;
    padding: 20px;
    column-count: 4;
    column-gap: 1.2rem;
    }

    .gallery-item {
    list-style: none;
    margin: 0 0 1.2rem;
    break-inside: avoid;
    border-radius: 12px;
    overflow: hidden;
    background: #222;
    box-shadow: 0 4px 10px rgba(0,0,0,0.4);
    }

    img {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 12px;
    transition: transform 0.4s, box-shadow 0.4s;
    }

    img:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(255,255,255,0.4);
    }

    @media (max-width: 1200px) {
    .gallery {
        column-count: 3;
    }
    }
    @media (max-width: 900px) {
    .gallery {
        column-count: 2;
    }
    }
    @media (max-width: 600px) {
    .gallery {
        column-count: 1;
    }
    }