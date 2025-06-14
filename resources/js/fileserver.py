#ndZRaQuMF84XsV4RMySf37IVmQKcI
#['http://127.0.0.1:8000', 'http://localhost:8000', 'https://masari.abukhalil.app']

from flask import Flask, request, jsonify, send_from_directory, abort
from flask_cors import CORS
import os
from werkzeug.utils import secure_filename

app = Flask(__name__)
CORS(app, origins=["http://127.0.0.1:8000", "http://localhost:8000"])

UPLOAD_FOLDER = os.path.join(os.getcwd(), 'uploads')
API_KEY = 'ndZRaQuMF84XsV4RMySf37IVmQKcI'  # Replace with a secure API key

os.makedirs(UPLOAD_FOLDER, exist_ok=True)

def verify_api_key(req):
    key = req.headers.get('x-api-key')
    if not key or key != API_KEY:
        abort(401, description='Unauthorized')

@app.route('/upload', methods=['POST'])
def upload_file():
    verify_api_key(request)

    member_id = request.form.get('memberId')
    category_id = request.form.get('categoryId')

    if not member_id or not category_id:
        return jsonify({'error': 'memberId and categoryId are required'}), 400

    if 'file' not in request.files:
        return jsonify({'error': 'No file uploaded'}), 400

    file = request.files['file']
    filename = secure_filename(file.filename)
    save_dir = os.path.join(UPLOAD_FOLDER, member_id, category_id)
    os.makedirs(save_dir, exist_ok=True)
    file_path = os.path.join(save_dir, filename)
    file.save(file_path)

    return jsonify({
        'message': 'File uploaded successfully',
        'path': f"{member_id}/{category_id}/{filename}"
    })

@app.route('/files/<member_id>/<category_id>', methods=['GET'])
def list_files(member_id, category_id):
    verify_api_key(request)

    dir_path = os.path.join(UPLOAD_FOLDER, member_id, category_id)
    if not os.path.exists(dir_path):
        return jsonify({'files': []})

    files = os.listdir(dir_path)
    return jsonify({'files': files})

@app.route('/files/<member_id>/<category_id>/<filename>', methods=['GET'])
def get_file(member_id, category_id, filename):
    verify_api_key(request)

    dir_path = os.path.join(UPLOAD_FOLDER, member_id, category_id)
    if not os.path.exists(dir_path):
        abort(404)

    return send_from_directory(directory=dir_path, path=filename, as_attachment=True)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
