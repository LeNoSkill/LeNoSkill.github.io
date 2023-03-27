
      document.addEventListener("DOMContentLoaded", function() {
        new FinisherHeader({
          "count": 12,
          "size": {
            "min": 1500,
            "max": 1500,
            "pulse": 0
          },
          "speed": {
            "x": {
              "min": 0.6,
              "max": 3
            },
            "y": {
              "min": 0.6,         
              "max": 3
        }
      },
      "colors": {
        "background": "#953eff",
        "particles": [
          "#ff681c",
          "#87ddfe",
          "#231efe"
        ]
      },
      "blending": "lighten",
      "opacity": {
        "center": 0.6,
        "edge": 0
      },
      "skew": 0,
      "shapes": [
        "c"
      ]
    });
  });
