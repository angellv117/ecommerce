import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';

const contenedor = document.getElementById('contenedor');

// Crear escena
const scene = new THREE.Scene();
scene.background = new THREE.Color(0xf0f0f0);

// Cámara
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.set(0, 1, 5);

// Render
const renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
contenedor.appendChild(renderer.domElement);

// Controles
const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true;
controls.dampingFactor = 0.05;

// Luz
const light = new THREE.HemisphereLight(0xffffff, 0x444444);
light.position.set(0, 20, 0);
scene.add(light);

// Cargar modelo GLB
const loader = new GLTFLoader();
loader.load('/storage/modelos/Pizza.glb', (gltf) => {
    scene.add(gltf.scene);
}, undefined, (error) => {
    console.error(error);
});

// Redimensionar
window.addEventListener('resize', () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
});

// Animación
const animate = function () {
    requestAnimationFrame(animate);
    controls.update();
    renderer.render(scene, camera);
};
animate();
